<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessageFavoriteControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "<div>messageFavariteControloer index</div>";
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $messages = $user->favaritings()->paginate(10);
            $count_messages = $user->favaritings()->count();

            $data = [
                'user' => $user,
                'messages' => $messages,
            ];
        }
        return view('messages.messagetile', $data);             
        
        
        
        
        
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
        \Auth::user()->favarite($request->id);
        return redirect()->back();  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        \Auth::user()->unfavarite($id);
        return redirect()->back();   

    }   
    
    public function favaritings($id)
    {
        //
        echo "<divMessageFavoriteControler >favaritings</div>";
    }    
    
    public function favariteds($id)
    {
        echo "<div>MessageFavoriteControler favariteds</div>";
    }
}
