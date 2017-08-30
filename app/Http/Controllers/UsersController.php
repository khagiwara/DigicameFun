<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Message;

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
        $user = User::find($id);
        
        if( \Auth::User()->id === $user->id ){
            return view('users.show', [
                'user' => $user,
            ]);
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
    public function passwordupdate(Request $request, $id)
    {
        //
        $this->validate($request, [
          'password' => 'required | same:password',
          'newpassword' => 'confirmed',
        ]);
      
        $user = User::find($id);
        
   
      echo " <div> UserController passwordupdate( Request, id )</div> ";
      echo "<pre>";
      print_r( $user->toArray() );
        echo $request->password,"<br>";
        echo $request->newpassword,"<br>";
        echo $request->newpassword_confirmation,"<br>";
 
      
      
            echo "</pre>";
      
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
