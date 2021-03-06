<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $this->validate(request(), ['body' => 'required|min:3']);
        
        //Add a comment to post
        
        $post->addComment(request('body'));

        return back();
    }
}
