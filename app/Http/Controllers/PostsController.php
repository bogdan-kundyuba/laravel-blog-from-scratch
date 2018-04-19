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
                ->get();

        // Temporary.
        
        $archives = Post::selectRaw('year(created_at) year, monthname(created_at)month, count(*) published')
                ->groupBy('year', 'month')
                ->orderByRaw('min(created_at)desc')
                ->get()
                ->toArray();
        
//        return $archives;

        return view('posts.index', compact('posts', 'archives'));
    }
    
    public function show($id)
    {
        $post = Post::find($id);
        
        return view('posts.show', compact('post'));
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store()
    {      
//        dd(request()->all());
//        dd(request(['title', 'body']));
        
        // Create a new post using a request data
        
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',  
        ]);
        
        auth()->user()->publish(
            new Post(request(['title', 'body']))    
        );

        // And then redirect to the home page
        
        return redirect('/');

    }
}
