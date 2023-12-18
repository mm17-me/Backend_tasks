<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // private $columns = ['title','description', 'author', 'published'];     //used in add and update method 2:


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
        // $post = $request->only($this->columns);  // used in add method 2

        $post= $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'author'=> 'required|string|max:50',
        ]);
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

     // $post = $request->only($this->columns);  // used in update method 2

        $post = $request->validate([
            'title'=>'required|string|max:50',
            'description'=>'required|string',
            'author'=> 'required|string|max:50',
         ]);
        $post['published'] = isset($request->published);
        post::where('id', $id)->update($post);
        return redirect("posts");
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        return redirect("posts");
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view("task/postsTrash",compact('posts'));

    }

    public function forceDelete(string $id)
    {
        Post::where('id', $id)->forceDelete();
        return redirect("trashedPost");
    }

    public function restore(string $id)
    {
        Post::where('id', $id)->restore();
        return redirect("posts");
    }
}
