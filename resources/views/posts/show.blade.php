@extends('layouts.master')


@section('content')

<div class="col-sm-8 blog-main">
    <h1>{{ $post->title }}</h1>
    
    @if(count($post->tags))
    
    <ul>
        @foreach($post->tags as $tag)
        <li>
            <a href="/public/tags/{{ $tag->name }}">
                {{ $tag->name }}
            </a>
        </li>
        @endforeach
    </ul>
    
    @endif

    {{ $post->body }}

    <hr> 

    <div class="commments">

        <ul class="list-group">
            @foreach($post->comments as $comment)

            <li class="list-group-item">
                <strong>
                    {{ $comment->created_at->diffForHumans() }}: &nbsp;
                </strong>
                {{ $comment->body }} 
            </li>

            @endforeach
        </ul>
    </div>
    
    <!-- Add a comment -->

    <div class="card">
        <div class="card-body">
            <form method="POST" action="/public/posts/{{ $post->id }}/comments">
                @csrf
                <div class="form-group">
                    <textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add comment</button>  
                </div>
                
            </form>
            @include('layouts.errors')
        </div>
    </div>

</div>

@endsection