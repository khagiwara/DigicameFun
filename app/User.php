<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'nickname', 'website', 'aboutme', 'tel', 'sex', 'path'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }

    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 自分自身ではないかの確認
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 自分自身ではないかの確認
        $its_me = $this->id == $userId;
        
        if ($exist && !$its_me) {
            // 既にフォローしていればフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }
    
    public function is_following($userId) {
        return $this->followings()->where('follow_id', $userId)->exists();
    }    
    public function feed_messages()
    {
        $follow_user_ids = $this->followings()->lists('users.id')->toArray();
        
//        print_r( $follow_user_ids );

        $follow_user_ids[] = $this->id;        
        return Message::whereIn('user_id', $follow_user_ids);
    }
    //--------------お気に入り用-------------
    public function message()
    {
        return $this->belongsToMany('App\Message');
    }

    public function favaritings()
    {
        return $this->belongsToMany(Message::class,'message_user')->withTimestamps();
    }

    public function favarite($messageid)
    {
        if ( $this->is_favariting($messageid)) {
            // 既にお気に入りにいるか自分自身であれば何もしない
            return false;
        } else {
            // それ以外はお気に入りに追加
            $this->favaritings()->attach($messageid);
            return true;
        }
    }
    public function unfavarite($messageid)
    {

        if ($this->is_favariting($messageid)) {
         echo "   <pre> 既にお気に入りにいればフォローを外す </pre><br>";
            $this->favaritings()->detach($messageid);
            return true;
        } else {
        echo "   <pre> お気に入りにいなければ何もしない</pre><br>";
            return false;
        }
    }    

    public function is_favariting($messageid) {
        return $this->favaritings()->where('message_id', $messageid)->exists();
    }

}





























