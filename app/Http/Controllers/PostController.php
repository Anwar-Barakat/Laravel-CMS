<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate('10');
        return view('backend.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories     = Category::all();
        $tags           = Tag::all();
        return view('backend.posts.create', [
            'categories'    => $categories,
            'tags'          => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $data                   = $request->only(['title', 'description', 'category_id', 'image', 'tags']);
        $data['user_id']        = Auth::id();
        $data['slug']           = SlugService::createSlug(Category::class, 'slug', $data['title']);

        $post = Post::create($data);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $post->addMediaFromRequest('image')->toMediaCollection('posts');
        }

        $post->tags()->attach($request->tags);

        Session::flash('message', 'Post has been added successfully');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags           = Tag::all();
        $categories     = Category::all();
        return view('backend.posts.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data                   = $request->only(['title', 'description', 'category_id', 'image']);
        $post->update($data);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $post->clearMediaCollection('posts');
            $post->addMediaFromRequest('image')->toMediaCollection('posts');
        }

        $post->tags()->sync($request->tags);

        Session::flash('message', 'Post has been updated successfully');
        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        Media::where(['model_id' => $post->id, 'collection_name' => 'posts'])->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', 'Post has been deleted successfully');
        return redirect()->route('admin.posts.index');
    }
}