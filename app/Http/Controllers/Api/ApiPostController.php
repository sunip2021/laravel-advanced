<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class ApiPostController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::get();
        // return response()->json([
        //     'message'=>'List of Posts',
        //     'posts'=>$posts
        // ],200);
       return $this->successResponse($posts);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // $post=new Post();
        // $post->title=$request->title;
        // $post->content=$request->content;
        // $post->save();
        $post=Post::create($request->validated());
        //  return response()->json([
        //     'message'=>'New post created',
        //     'posts'=>$post
        // ],200);
        return $this->successResponse($post,'New post created!',201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        //  return response()->json([
        //     'message'=>'single record',
        //     'posts'=>$post
        // ],200);
        
         return $this->successResponse($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // $post->title=$request->title;
        // $post->content=$request->content ?? $post->content;
        // $post->save();
     
        $post->update($request->validated());
        //  return response()->json([
        //     'message'=>'post updated',
        //     'posts'=>$post
        // ],200);
         return $this->successResponse($post, 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        //  return response()->json([
        //     'message'=>'post deleted',
        //     'posts'=>$post->delete()
        // ],200);
         return $this->successResponse(null,'Post Deleted');
    }
}
