<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Reply;
use App\Forum;

class ReplyController extends Controller
{
    public function index(){
        $reply = Reply::all();
        $forum = Forum::where('id',$id)->first;
        return view('page.comment', compact('reply'),compact('forum'));
    }

    public function create(){
        return view('page.reply');
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'description' => 'required|max:255'
        ]);
        
        $reply = new Reply;
        $reply->comment_id = 1;
        $reply->user_id = $request->user_id;
        $reply->description = $request->description;
        $res = $reply->save();

        if($res){
            return redirect('/forum');
        }else{
            return redirect('/forum');
        }
    } 

    public function show($id){
        $forum = Forum::all();
        $reply = Reply::find($id)->first();
        return view('page.comment', compact('reply'),compact('forum'));
    }

    

    public function destroy($id){
        $reply = Reply::where('id',$id)->delete();
        
        return redirect('/forum')->with('success', 'comment berhasil dihapus');
    }
}
