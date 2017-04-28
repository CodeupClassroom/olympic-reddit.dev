<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\User;
use Session;
use Log;

class PostsController extends Controller
{
    // getting access to the request, is as a easy as adding it as a parameter to any controller
    // action
    public function index(Request $request)
    {
        $posts = Post::paginate(4);

        $data = [];
        $data['posts'] = $posts;

        return view('posts.index')->with($data);
    }

    public function create(Request $request)
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, Post::$rules);

        $post = new Post();
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = User::all()->random()->id;
        $post->save();

        Log::info("New post saved", $request->all());

        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$post->id]);
    }

    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }

        $data = [];
        $data['post'] = $post;

        return view('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }

        $data = [];
        $data['post'] = $post;

        return view('posts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, Post::$rules);

        $post = Post::find($id);

        if (!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }

        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = $request->created_by;
        $post->save();

        $request->session()->flash('successMessage', 'Post updated successfully');
        return redirect()->action('PostsController@show', [$post->id]);
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            Log::error("Post with id of $id not found.");
            abort(404);
        }

        $post->delete();

        $request->session()->flash('successMessage', 'Post deleted successfully');

        return view('posts.index');
    }
}
