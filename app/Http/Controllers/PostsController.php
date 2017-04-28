<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    // getting access to the request, is as a easy as adding it as a parameter to any controller
    // action
    public function index(Request $request)
    {
        //dd($request->session());  // The session is now an object, not an associative array
        // we can get access to session through the request

//        $session = $request->session();  // session_start();
//
//        $session->clear();  // \Session::clear()
//        // Facade
//        \Session::clear(); // $session->clear();
//
//        //$session->put('greet', 'hello world');  // $_SESSION['greet'] = 'hello world!';
//        $session->flash('greeting', 'hello world');  // available only for the NEXT request

        $posts = \App\Models\Post::paginate(4);

        $data = [];
        $data['posts'] = $posts;

        return view('posts.index')->with($data);
    }

    public function create(Request $request)
    {
        //$session = $request->session();

        //$session->forget('greeting'); // unset($_SESSION['greet']);

        //$session->flush(); // unset($_SESSION);  // $_SESSION = [];

        //dd($session->get('greeting'));  // dd($_SESSION['greet']);

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
        $rules = [
            'title' => 'required|max:100',
            'url'   => 'required|url',
            'content'   => 'required',
        ];

        $this->validate($request, $rules);

        $post = new \App\Models\Post();
        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = 1;
        $post->save();

        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$post->id]);
    }

    public function show(Request $request, $id)
    {
        //$session = $request->session();
        //dd(\Session::get('greeting'));  // Laravel 4
        //dd($session->get('greeting'));  // Laravel 5

        $post = \App\Models\Post::find($id);

        if (!$post) {
            $request->session()->flash('errorMessage', 'Post cannot be found');
            return redirect()->action('PostsController@index');
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
        $post = \App\Models\Post::find($id);

        if (!$post) {
            $request->session()->flash('errorMessage', 'Post cannot be found');
            return redirect()->action('PostsController@index');
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
        $rules = [
            'title' => 'required|max:100',
            'url'   => 'required|url',
            'content'   => 'required',
        ];

        $this->validate($request, $rules);

        $post = \App\Models\Post::find($id);

        if (!$post) {
            $request->session()->flash('errorMessage', 'Post cannot be found');
            return redirect()->action('PostsController@index');
        }

        $post->title = $request->title;
        $post->url = $request->url;
        $post->content = $request->content;
        $post->created_by = $request->created_by;
        $post->save();

        $request->session()->flash('successMessage', 'Post saved successfully');
        return redirect()->action('PostsController@show', [$post->id]);
    }

    public function destroy(Request $request, $id)
    {
        $post = \App\Models\Post::find($id);

        if (!$post) {
            $request->session()->flash('errorMessage', 'Post cannot be found');
            return redirect()->action('PostsController@index');
        }

        $post->delete();

        return view('posts.index');
    }
}
