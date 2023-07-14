<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Tests\TestCase;
use App\Models\Post;

class PostControllerTest extends TestCase
{

    public function testIndexMethodWithGateAllows()
    {
        $ability = 'index';
        Gate::shouldReceive('allows')->with($ability)->once()->andReturn(true);
        $this->assertTrue(Gate::allows($ability));

        $posts = Post::factory()->count(3)->create();
        $response = $this->get('/posts');
        $response->assertStatus(200);
        $response->assertViewIs('posts.index');
        $response->assertViewHas('posts', $posts);
    }

    public function testIndexMethodWithGateDoesNotAllow()
    {
        $response = $this->get(route('posts.index'));

        $ability = 'index';
        Gate::shouldReceive('allows')->with($ability)->once()->andReturn(false);
        $this->assertFalse(Gate::allows($ability));

        $response->assertStatus(404);
    }

    public function testCreateMethodWithGateAllows()
    {
        $response = $this->get('/posts/create');

        $ability = 'create';
        Gate::shouldReceive('allows')->with($ability)->once()->andReturn(true);
        $this->assertTrue(Gate::allows($ability));

        $response->assertOk();
        $response->assertViewIs('post.create');
    }

    public function testCreateMethodWithGateDoesNotAllow()
    {
        $ability = 'create';
        Gate::shouldReceive('allows')->with($ability)->once()->andReturn(false);
        $this->assertFalse(Gate::allows($ability));

        $response = $this->get(route('posts.create'));

        $response->assertStatus(404);
    }

}
