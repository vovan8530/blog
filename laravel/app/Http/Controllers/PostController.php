<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use phpDocumentor\Reflection\Types\Resource_;

class PostController extends Controller
{

    /**
     * @param Post $posts
     * @return View
     */
    public function index(Request $request, Post $posts ):View
    {
        $view=auth()->check()?'admin.posts.index':'posts.index';
        return view($view,[
           'posts' => $posts->with('user')->get(),
        ]);
    }


    /**
     * @param Post $post
     * @return View
     */
    public function show(Post $post):View
    {
        return view('posts.show',[
            'post' => $post,
        ]);
    }


}
