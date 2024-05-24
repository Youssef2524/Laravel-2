<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $post=post::all();

        return response()->json($post,200);
    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $request->validate();
        $post=new post();
        $post->title=$request->title;
        $post->description=$request->description;
        $post->category_id=$request->category_id;
        $post->user_id=$request->user_id;
        $post->save();

        return response()->json($post,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post,$id)
    {
        return response()->json($post);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post,$id)
    {
        $post->delete();

        return response()->json(null, 204);
    }
}
