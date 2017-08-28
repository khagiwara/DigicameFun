<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;




class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        echo "<div>MessagesController index</div>";
        
        
   //     $messages = Message::all();
        $messages = 
        \DB::table('messages')
            ->join('users','messages.user_id', '=', 'users.id')
            ->select('users.*', 'messages.*')
            ->orderby('messages.updated_at', 'disc')
            
            ->get();
        
        
        
        
        
		return view('messages.messagetile', [
            'messages' => $messages,
        ]);   
                
        
    }
    
    public function messagelist()
    {
        echo "<div>MessagesController list</div>";
        return view('messages.messagelist');        
	
	}
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo "<div>MessagesController create</div>";
         $message = new Message;

        return view('messages.create', [
            'message' => $message,
        ]);        
        
        
        
        
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                'mimes:jpeg,bmp,png',
                
                // アップロードされたファイルであること
   //             'file',
                // 最小縦横120px 最大縦横400px
  //              'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);

        //
        echo "<pre>";
        


         print_r( $_FILES );      
        $message = new Message;
        $message->user_id = \Auth::user()->id;
        $message->title = $request->title;
        $message->message = $request->message;
        if ($request->file('file')->isValid([])) {
		    $message->imgpath = "/avatar/". $request->file->getClientOriginalName();
			$request->file('file')->move(public_path('avatar'), $request->file->getClientOriginalName());
			$message->save();
			echo "<img src=\"/avatar/". $request->file->getClientOriginalName() ,"\">";
		}
        
        return redirect('messages');
        
    }
    /**
     * ファイルアップロード処理
     */
    public function upload(Request $request)
    {
	    global $_FILES;
	    
/*
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 最小縦横120px 最大縦横400px
                'dimensions:min_width=120,min_height=120,max_width=400,max_height=400',
            ]
        ]);
        
*/
echo "<pre>";
print_r($_FILES );
print_r(  $request->file('originalName') );

        if ($request->file('file')->isValid([])) {
           // $filename = $request->file->store('public/avatar');

   echo "public_path=",public_path('avatar'),"<br>";

      echo "originalName=", $request->file('file'),"<br>",
      "getMimeType=" , $request->file->getMimeType(),"<br>",
      "getClientMimeType=", $request->file->getClientMimeType(),"<br>",
      "getClientOriginalName=", $request->file->getClientOriginalName();

             $request->file('file')->move(public_path('avatar'), $request->file->getClientOriginalName());
     
      
      
      echo "<hr>";
      
print_r($request["file"] );

        }
  echo "</pre>";
  
/*
        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/avatar');

            $user = User::find(auth()->id());
            $user->avatar_filename = basename($filename);
            $user->save();

            return redirect('/home')->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
*/
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "<div>MessagesController show</div>";
        
        $message = 	// Message::find($id);
         \DB::table('messages')
            ->join('users','messages.user_id', '=', 'users.id')
            ->select('messages.*', 'users.name')
            ->where('messages.id', $id )   
            ->get();        

/*
echo "<pre>";
echo "id=$id<br>";
 print_r( $message ) ;
echo "</pre>";
*/

        $coments =
        \DB::table('coments')
            ->join('users','coments.coment_user_id', '=', 'users.id')
            ->select('coments.*', 'users.name')
            ->where('message_id', $id )   
            ->orderby('updated_at','desc')         
            ->get();        

			return view('messages.show', [
            'message' => $message[0],
            'coments' => $coments,
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
