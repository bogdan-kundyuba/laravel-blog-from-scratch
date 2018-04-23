<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/public/">Home</a>
            <a class="nav-link" href="/public/posts/create">Create post</a>
            <a class="nav-link" href="/public/register">Registration</a>
            <a class="nav-link" href="/public/logout">Sign out</a>
            <a class="nav-link" href="/public/">Contacts</a>
            @if (Auth::check())
                <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
            @endif
        </nav>
    </div>
</div>