<?php

namespace App\Http\Controllers\Admin;

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|View
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
