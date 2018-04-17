<?php

namespace App;

use App\Model;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function user() //$comment->post->user
    {  
        $this->belongsTo(User::class);
    }
    
    public function addComment($body)
    {
//        $this->comments()->create();
        
        $this->comments()->create(compact('body'));
        
//        $this->comments()->create(compact('body', '$user_id'));
    }
    
}
