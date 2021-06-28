<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Forum;
use App\Comment;
use App\User;
use App\Reply;

class ForumController extends Controller
{
    public function index(){
        $forum = Forum::orderBy('updated_at','desc')->get();
        return view('forum', compact('forum'));
    }

    public function create(){
        return view('page.create');
    }
    
    public function store(Request $request){
        $user = User::all();
        $validatedData = $request->validate([
            'title' => 'required|max:45',
            'description' => 'required|max:255'
        ]);

        $forum = new Forum;
        $forum->user_id = $request->user_id;
        $forum->title = $request->title;
        $forum->description = $request->description;
        $res = $forum->save();

        if($res){
            return redirect('/forum')->with('success', 'Forum berhasil dibuat');
        }else{
            return redirect('/forum')->with('success', 'Forum gagal dibuat');
        }
    } 

    public function show($id){
        $reply = Reply::all();
        $comment = Comment::all();
        $forum = Forum::find($id)->first();
        return view('page.comment', compact('forum'), compact('comment'),compact('reply'));
    }

    public function edit($id){
        $forum = Forum::where('id',$id)->first();
        return view('page.edit', compact('forum'));
    }

    public function update($id, Request $request){
        $validatedData = $request->validate([
            'title' => 'required|max:45',
            'description' => 'required|max:255'
        ]);

        $forum = Forum::where('id',$id)->update(["title" => $request["title"],"description" => $request["description"]]);

        return redirect('/forum')->with('success', 'Forum berhasil diupdate');
    }

    public function destroy($id){
        $forum = Forum::where('id',$id)->delete();
        
        return redirect('/forum')->with('success', 'Forum berhasil dihapus');
    }

    public function profile(){
        return view('page.profile');
    }

    
}

    
