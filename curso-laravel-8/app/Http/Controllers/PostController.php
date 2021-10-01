<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use Illuminate\Http\Request;
use App\Models\{
    Post
};

class PostController extends Controller
{
    public function index()
    {

        $posts = Post::all();

        //dd($posts);

        return view('index', compact('posts'));
    }


    public function create()
    {
        return view('components.postComponents.create');
    }

    public function store(StoreUpdatePost $request)
    {

        Post::create($request->all());
        return redirect()->route('posts.index')->with('sucesso','Post criado com sucesso.');
    }
}
