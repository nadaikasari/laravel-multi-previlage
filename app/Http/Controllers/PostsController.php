<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('index')) {
            $posts = Post::all();
            
            return view('posts.index', compact('posts'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('create')) {
            abort(403);
        } else {
            return view('posts.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('create')) {
            abort(403);
        } else {
            Post::create(array_merge($request->only('title', 'description', 'body'),[
                'user_id' => auth()->id()
            ]));

            return redirect()->route('posts.index')
                ->withSuccess(__('Post created successfully.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (!Gate::allows('view')) {
            abort(403);
        } else {
            return view('posts.show', [
                'post' => $post
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (!Gate::allows('update')) {
            abort(403);
        } else {
            return view('posts.edit', [
                'post' => $post
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (!Gate::allows('update')) {
            abort(403);
        } else {
            $post->update($request->only('title', 'description', 'body'));

            return redirect()->route('posts.index')
                ->withSuccess(__('Post updated successfully.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (!Gate::allows('update')) {
            abort(403);
        } else {
            $post->delete();

            return redirect()->route('posts.index')
                ->withSuccess(__('Post deleted successfully.'));
        }
    }
}
