<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Exists;
use Illuminate\Support\Arr;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'category_id' => 'nullable | exists:categories,id',
            'title' => 'required | max:255',
            'author' => 'required | max:255',
            'body' => 'required | max:500',
            'img' => 'image | max:1050',
            'note' => 'max:255',
            'tags' => 'nullable | exists:tags,id',
        ]);

        ddd($validatedData);

        if (in_array('img', $validatedData)) {
            // Se esiste l'immagine spostala nello spazio web dedicato all'archiviazione
            $cover_img = Storage::disk('public')->put('posts/cover', $request->img);
            $validatedData['img'] = $cover_img;
        } else {
            // se non esiste, usa l'immagine dentro l'asset e valida i dati nuovamente

        }

        $post = Post::create($validatedData);
        $post->tags()->attach($validatedData['tags']);
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'category_id' => 'nullable | exists:categories,id',
            'title' => 'required | max:255',
            'author' => 'required | max:255',
            'body' => 'required | max:500',
            'img' => 'image | max:1050',
            'note' => 'max:255',
            'tags' => 'nullable | exists:tags,id',
        ]);

        /* 
        Se "img" ovvero l'array di modifica ?? vuoto, ovvero falso, non fare nulla
        se ?? vero, quindi nuova immagine, esegui il codice
         */
        if (array_key_exists('img', $validatedData)) {

            Storage::disk('public')->delete($post->img);
            $cover_img = Storage::disk('public')->put('posts/cover', $request->img);
            $validatedData['img'] = $cover_img;
        }

        $post->update($validatedData);
        $post->tags()->sync($validatedData['tags']);
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        /* ELimina le immagini di copertina conservate nel server */
        Storage::disk('public')->delete($post->img);
        /* ################### */
        Post::destroy($post->id);
        return redirect()->route('posts.index');
    }
}