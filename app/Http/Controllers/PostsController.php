<?php

namespace App\Http\Controllers;

use App\Post;
use Carbon\Carbon;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']); 
    }
    
    public function index()
    {   
        $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->with('tags')
                ->get();
        
        return view('posts.index', compact('posts'));
    }
    
    public function show(Post $post)
    {

        return view('posts.show', compact('post'));
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store()
    {      
        // Create a new post using a request data
        
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',  
        ]);
        
        auth()->user()->publish(
            new Post(request(['title', 'body']))    
        );
        
        session()->flash(
                'message', 'Your post has now been publish.'
        );
        
        // And then redirect to the home page
        
        return redirect('/');

    }
}
