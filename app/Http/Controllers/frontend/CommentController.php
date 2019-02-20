<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use App\Comment;

class CommentController extends Controller
{
    public function add(Request $request,Post $berita)
    {
        $this->validate($request,[
            'body' => 'required',
        ]);
        $comment = new Comment();
        $comment->body = $request->body;
        $comment->user_id = auth()->user()->id;      
        $berita->comments()->save($comment);
        return back()->withMessage('Comment Created');
    }


    public function addReply(Request $request,Comment $comment)
    {
        $this->validate($request,[
            'body' => 'required',
        ]);
        $reply = new Comment();
        $reply->body = $request->body;
        $reply->user_id = auth()->user()->id;      
        $comment->comments()->save($reply);

        return back()->withMessage('Reply Comment Created');
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
        $comment = Comment::findOrFail($id);
        $this->validate($request,[
            'body' => 'required',
        ]);
        $comment->update($request->all());
        return back()->withMessage('Comments or Reply Comments Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comment::destroy($id);
        return back()->withMessage('Comments or Reply Comments Deleted');
    }
}
