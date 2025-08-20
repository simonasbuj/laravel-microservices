<?php

namespace App\Http\Controllers;

use App\Jobs\PostCreate;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() 
    {
        return Post::all();
    }

    public function show($id) 
    {
        return Post::find($id);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        
        PostCreate::dispatch($post->toArray());

        return response()->json("new post has been created", 201);
    }

    public function edit($id)
    {
        return Post::find($id);
    }

    public function update(Request $request) 
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'post not found'], 404);
        }

        $post->update($request->all());
        return response()->json("post has been updated", 201);
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return response()->json("post has been deleted", 201);
    }
}
