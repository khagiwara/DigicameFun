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
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $messages = $user->feed_messages()->orderBy('updated_at', 'desc')->paginate(12);
            $count_messages = $user->messages()->count();
            $data = [
                'user' => $user,
                'messages' => $messages,
            ];
        }
        return view('messages.messagetile', $data);        

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
//        echo "<div>MessagesController create</div>";
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
	        'title' => 'required|max:255',
            'message' => 'required|max:255',
            'file' =>   'required|mimes:jpeg,png|max:200',      // jpeg png 限定 2MB　制限
        ]);
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
       echo "<div>MessagesController show</div>";
       $m =  Message::find($id);
      $favaritingcount =  $m->favaritings()->count();
   //    $message->favaritings()->count() 
  //     $favaritingcount = $m->favaritings()->count() 
        $message = 	// Message::find($id);
         \DB::table('messages')
            ->join('users','messages.user_id', '=', 'users.id')
            ->select('messages.*', 'users.name')
            ->where('messages.id', $id )   
            ->get();   
        $user = User::find($message[0]->user_id);
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
            'user'	=> $user,
            'favaritcount' => $favaritingcount,
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
       $message = Message::find($id);
        return view('messages.edit', [
            'message' => $message,
        ]);            
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
        global $_FILES;
       $message = Message::find($id);
        if( !$_FILES["file"]["error"] ){
             $this->validate($request, [
    	        'title' => 'required|max:255',
                'message' => 'required|max:255',
                'file' =>   'required|mimes:jpeg,png|max:200',      // jpeg png 限定 2MB　制限
            ]);            
            if ($request->file('file')->isValid([])) {
    		    $message->imgpath = "/avatar/". $request->file->getClientOriginalName();
    			$request->file('file')->move(public_path('avatar'), $request->file->getClientOriginalName());
 //   			echo "<img src=\"/avatar/". $request->file->getClientOriginalName() ,"\">";
    		}     
        }
        else{
          $this->validate($request, [
	        'title' => 'required|max:255',
            'message' => 'required|max:255',

            ]);          
        }
        $message->user_id = \Auth::user()->id;
        $message->title = $request->title;
        $message->message = $request->message;       
        $message->save();        
        return redirect('messages');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        echo "public function destroy($id)";
        $message = Message::find($id);
//        echo "message->user_id=",$message->user_id,"<br>";

//		echo "Auth::user()->id=" , \Auth::user()->id;

		if (\Auth::user()->id === $message->user_id) {
            $message->delete();
        }
        

        
        return redirect('/messages');
        }
}
