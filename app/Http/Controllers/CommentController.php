<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Comment;
use App\Forum;

class CommentController extends Controller
{
    public function index(){
        $comment = Comment::all();
        $forum = Forum::where('id',$id)->first;
        return view('page.comment', compact('comment'),compact('forum'));
    }

    public function create(){
        return view('page.comment');
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'description' => 'required|max:255'
        ]);
        
        $comment = new Comment;
        $comment->forum_id = 1;
        $comment->user_id = $request->user_id;
        $comment->description = $request->description;
        $res = $comment->save();

        if($res){
            return redirect('/forum');
        }else{
            return redirect('/forum');
        }
    } 

    public function show($id){
        $forum = Forum::all();
        $comment = Comment::find($id)->first();
        return view('page.comment', compact('comment'),compact('forum'));
    }

    

    public function destroy($id){
        $comment = Comment::where('id',$id)->delete();
        
        return redirect('/forum')->with('success', 'comment berhasil dihapus');
    }
}
