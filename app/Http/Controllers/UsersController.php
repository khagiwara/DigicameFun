<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('users.index', [
            'users' => $users,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 echo "<div>UsersControoler@show</div>";
        $user = User::find($id);
        
        if( \Auth::User()->id === $user->id ){
            return view('users.show', [
                'user' => $user,
            ]);
        }
        else{
            $messages =$user->messages();
            $count_messages = $user->messages()->count();
 
            echo "count_messages= $count_messages<br>";
            $data = [
                'user' => $user,
                'messages' => $user->messages()->paginate(12),
            ];
            return view('messages.messagetile', $data);   
        }
    }
    public function avatar($id)
    {
        $user = User::find($id);
        
        if( \Auth::User()->id === $user->id ){
            return view('users.avatar', [
                'user' => $user,
            ]);
        }

    }
    public function messagelist($id){
        

        $user = User::find($id);
        $messages =  $user->messages()->orderBy('created_at', 'desc')->paginate(6);

  
        if( \Auth::User()->id === $user->id ){
            return view('users.messagelist', [
                'user' => $user,
                'messages' => $messages

            ]);
        }
        
    }
    
    
    public function profile($id)
    {

        $user = User::find($id);
/*
        echo "id=$id<br>";
        echo "<pre>";
        print_r($user);
        echo "</pre>";
*/
        return view('users.profile', [
            'user' => $user,
        ]);
    }   
    public function password($id)
    {
        $user = User::find($id);
/*
        echo "id=$id<br>";
        echo "<pre>";
        print_r($user);
        echo "</pre>";
*/
        return view('users.password', [
            'user' => $user,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
   
      echo " <div> UserController update( Request, id )</div> ";


        $user->name      =   $request->name;  
        $user->email     =   $request->email;   
        $user->nickname  =   $request->nickname;
        $user->website   =   $request->website;
        $user->aboutme   =   $request->aboutme;  
        $user->tel       =   $request->tel;   
        $user->sex       =   $request->sex;  
        $user->save();
        return redirect('/messagelist/'. $user->id);         

        
    }
    public function avatarstore(Request $request, $id)
    {
        global $_FILES;
        //
        echo "avatarstore";
        $user = User::find($id);
        echo "<pre>";
        print_r($user->toArray() );

        
        echo "</pre>";
        
          $this->validate($request, [

            'file' => [
                // 必須
                'required',
                'mimes:jpeg,png',
     // アップロードされたファイルであること
    //             'file',
    //             最小縦横120px 最大縦横400px
    //      'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);

        //
        echo "<pre>";
         print_r( $_FILES );      

        if ($request->file('file')->isValid([])) {
		    $user->path = "/avatar/". $request->file->getClientOriginalName();
			$request->file('file')->move(public_path('avatar'), $request->file->getClientOriginalName());
			$user->save();
			echo "<img src=\"/avatar/". $request->file->getClientOriginalName() ,"\">";
		}
       echo "</pre>";        
        return redirect('/users/'. $user->id);      
        
        
        
        
        
        
        
        
        
        
        
        
    }
    public function passwordupdate(Request $request, $id)
    {
        //
        $this->validate($request, [
          'password' => 'required',
          'newpassword' => 'required | confirmed | min:8 | max:32',
        ]);
      
          $user = User::find($id);   
 
       if (Hash::check($request->password , $user->password)) {
        
        echo "パスワード一致";
            $user->password = bcrypt( $request->paginate);
            $user->save();
            $request->session()->flash('flash_message','パスワードは変更されました。');
            return redirect('/users/'. $user->id ); 
 /*      
            echo " <div> UserController passwordupdate( Request, id )</div> ";
            echo "<pre>";
            print_r( $user->toArray() );
            echo $request->password,"<br>";
            echo $request->newpassword,"<br>";
            echo $request->newpassword_confirmation,"<br>";   
*/
        }
        else {
            $request->session()->flash('flash_message','登録のパスワードと一致しません。');
            return redirect('/password/'. $user->id ); 
        }
     
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
