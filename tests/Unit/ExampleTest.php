<?php

namespace Tests\Unit;

use App\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        // Give I have two records in the database in the posts.
        
        // and each one is posted in month apart.
        $first = factory(Post::class)->create();
        
        $second = factory(Post::class)->create([
            'created_at' => \Carbon\Carbon::now()->subMonth()
            ]);
 
        // When I fetch the archives.
        $posts = Post::archives();
        dd($post);
        
        // Than response should be in the proper format.
        $this->assertEquels([
            [
                
            ]
        ], $posts);
    }
}
