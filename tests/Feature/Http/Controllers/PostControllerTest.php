<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Tests\TestCase;
use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\View;

class PostControllerTest extends TestCase
{

    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testIndexMethod()
    // {
        // Memastikan Gate::allows('index') mengembalikan nilai true
        // Gate::shouldReceive('allows')->once()->with('index')->andReturn(true);

        // Memanggil route 'posts.index'
        // $response = $this->get('/posts');

        // Memastikan bahwa status response adalah 200 (OK)
        // $response->assertOk();

        // Memastikan bahwa jumlah postingan yang ditampilkan adalah 10
        // $posts = $response->original->getData()['posts'];
        // $this->assertCount(10, $posts);
    // }

    

    // public function testIndexMethodWithGateDoesNotAllow()
    // {
    //     // Memastikan Gate::allows('index') mengembalikan nilai false
    //     Gate::shouldReceive('allows')->once()->with('index')->andReturn(false);

    //     // Memanggil route 'posts.index'
    //     $response = $this->get(route('posts.index'));

    //     // Memastikan bahwa status response adalah 403 (Forbidden)
    //     // $response->assertStatus(403);
    // }

        // public function testIndexMethodWithGateAllows()
    // {
        
        // Gate::shouldReceive('denies')->with('index')->andReturn(true)->once();;
        // $response = $this->get('/posts')->assertStatus(403);

        // Create sample posts
        // $posts = Post::factory()->count(5)->create();

        // Mock the view and make sure it is being called with the correct data
        // View::shouldReceive('make')->with('posts.index', compact('posts'))->once()->andReturn('mocked_view');

        // Make a GET request to the index route
        // $response = $this->get('/posts');

        // Assert that the response is the mocked view
        // $response->assertViewIs('mocked_view');
    // }

}
