<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $columns = ['title','description', 'author', 'published'];

    public function index()
    {
        //
        $posts = Post::get();
        return view("task/posts", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view ('task/addPost');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = $request->only($this->columns);
        $post['published'] = isset($request->published);
        post::create($post);
        return redirect("posts");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = post::findOrFail($id);
        return view('task/showPost', compact('post') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $post = post::findOrFail($id);
        return view('task/updatePost', compact('post') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = $request->only($this->columns);
        $post['published'] = isset($request->published);
        post::where('id', $id)->update($post);
        return redirect("posts");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
