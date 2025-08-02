<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all posts from the database and pass them to the index view.
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form to create a new post.
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data.
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Create a new post and store it in the database.
        Post::create($request->all());

        // Redirect to the index page with a success message.
        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Show the details of a single post.
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Show the form to edit an existing post.
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Validate the request data.
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Update the post with the new data.
        $post->update($request->all());

        // Redirect to the index page with a success message.
        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Delete the post from the database.
        $post->delete();

        // Redirect to the index page with a success message.
        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully.');
    }
}
