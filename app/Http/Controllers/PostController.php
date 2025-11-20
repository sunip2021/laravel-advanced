<?php

namespace App\Http\Controllers;

use App\Events\PostCreated;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
            
        return view('newpost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
 
        $validator=Validator::make($request->all(),[
            'title' => 'required',
            'description'=>'required'
        ]);
        if($validator->fails()) {
            return redirect()->route('post.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
            try {
               
                $data['title'] = $request->title;
                $data['description']=$request->description;
                $data['user_id']=$request->user()->id;
                $result=Post::create($data);

                $sendData=["title"=>$data['title'],"author"=>$request->user()->name];
                event(new PostCreated($sendData));
                

                return redirect()->back()->with('post created');
            } catch(\Exception $e) {
                return $e->getMessage();
            } 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
