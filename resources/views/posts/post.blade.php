<div class="blog-post">

    <h2 class="blog-post-title">
        <a href="/public/posts/{{ $post->id }}">
        {{ $post->title }}
        </a>
    </h2>
    
    {{ $post->user['name'] }}

    <p class="blog-post-meta">{{ $post->created_at->toFormattedDateString() }}</p>

    {{ $post->body }}
    
</div>
