<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

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
        
        if( \Auth::User()->id === $user->id ){
            return view('users.messagelist', [
                'user' => $user,
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
