<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreatePostRequest;
use App\Http\Transformers\PostTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\View\View;


class PostController extends Controller
{
    /**
     * @param Request $request
     * @param Post $posts
     * @return View
     */
    public function index(Request $request, Post $posts):View
    {
        return view('admin.posts.index',[
            'posts' => $posts->getAll($request),
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return PostTransformer
     */
    public function show(Request $request, Post $post){
        return view('admin.posts.create',[
            'published_status' => config('config.models.published_status'),
            'post' => new PostTransformer($post),
        ]);
    }

    /**
     * @return View
     */
    public function create():View
    {
        return view('admin.posts.create',[
            'published_status' => config('config.models.published_status'),
        ]);
    }

    /**
     * @param CreatePostRequest $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreatePostRequest $request, Post $post)
    {
        $post->create($request->all());
        return redirect()->route('admin.posts.index');
    }


    /**
     * @param Post $post
     * @return View
     */
    public function edit(Post $post):View
    {
        return view('admin.posts.edit',[
            'post' => $post,
            'published_status' => config('config.models.published_status'),
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('admin.posts.edit',[$post->slug]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
       $post->delete();
       return redirect()->route('admin.posts.index');
    }
}
