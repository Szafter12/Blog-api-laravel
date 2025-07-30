<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::get();

        return response()->json([
            'status' => 'success',
            'data' => [
                'posts' => $posts,
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        $new_post = Post::create($validated);

        return response()->json([
            'status' => 'success',
            'data' => [
                'post' => $new_post
            ]
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'status' => 'failed',
                'message' => 'post not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'post' => $post
            ]
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, string $id)
    {
        $validated = $request->validated();

        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'status' => 'failed',
                'message' => 'post not found'
            ]);
        }

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->save();

        return response()->json([
            'status' => "success",
            'data' => [
                "post" => $post
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Post::destroy($id) === 0) {
            return response()->json([
                'status' => 'failed',
                'message' => 'post not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'post deleted succesfuly'
        ], 200);
    }
}
