<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;


class PostController extends Controller
{

    /**
     * @param Request $request
     * @param Post $posts
     * @return View
     */
    public function index(Request $request, Post $posts ):View
    {

        return view('posts.index',[
            'posts' =>  $posts->with('user')->get(),
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
