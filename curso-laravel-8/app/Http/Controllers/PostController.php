<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\{
    Post
};

class PostController extends Controller
{
    // initial
    public function index()
    {

        $posts = Post::latest()->paginate();

        //dd($posts);

        return view('components.postComponents.post', compact('posts'));
    }
    // search
   /*
    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate(1);

        return view('index', compact('posts', 'filters'));
    }
   */
    // create
    public function create()
    {
        return view('components.postComponents.create');
    }

    public function store(StoreUpdatePost $request)
    {
       $data = $request->all();
       if ( $request->file('image')->isValid()) {


            $nameFile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientOriginalExtension();

            $file = $request->file('image')->storeAs('posts', $nameFile);
            $data['image'] = $file;
        }

        Post::create($data);
        return redirect()->route('posts.index')->with('sucesso','Post criado com sucesso.');
    }

    // show
    public function show($id)
    {
        //$post = Post::where('id', $id)->first();
        $post = Post::find($id);
        if(isset($post)){
            return view('components.postComponents.show', compact('post'));
        }
            return redirect()->back()->with('error','post não encontrado');


    }

    // Update
    public function edit($id)
    {
        $post = Post::find($id);
        if(isset($post)){
            return view('components.postComponents.edit', compact('post'));
        }
            return redirect()->back()->with('error','post não encontrado');


    }

    public function update(StoreUpdatePost $request,$id)
    {


        $post = Post::find($id);
        if(isset($post)){

            $data = $request->all();
            if ($request->file('image') && $request->file('image')->isValid()) {
                if( Storage::exists($post->image)){
                    Storage::delete($post->image);
                }

                 $nameFile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientOriginalExtension();

                 $file = $request->file('image')->storeAs('posts', $nameFile);
                 $data['image'] = $file;
             }


            if( $post->update($data)){
                return redirect()->route('posts.index')->with('sucesso','Post editado com sucesso.');
            }
        }
            return redirect()->back()->with('error','post não encontrado');


    }


    // delete
    public function destroy($id)
    {
        $post = Post::find($id);
        if(isset($post)){
           if( Storage::exists($post->image)){
                Storage::delete($post->image);
           }
           $destroy = $post->delete();
           if(isset($destroy)){
                return redirect()->route('posts.index')->with('sucesso','Post deletado com sucesso.');
            }
        }
    }


}
