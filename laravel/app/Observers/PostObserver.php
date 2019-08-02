<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * @param Post $post
     */
    public function creating(Post $post)
    {
        $post->slug =Str::slug($post->title);
        if(!isset($post->user_id)){
            $post->user()->associate(auth()->user());
        }
    }

    /**
     * @param Post $post
     */
    public function updating(Post $post)
    {
        $post->slug =Str::slug($post->title);
        $post->user()->associate(auth()->user());
    }

    /**
     * @param Post $post
     */
    public function created(Post $post)
    {
        //
    }

    /**
     * Handle the post "updated" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function updated(Post $post)
    {
        //
    }

    /**
     * Handle the post "deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function deleted(Post $post)
    {
        //
    }

    /**
     * Handle the post "restored" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function restored(Post $post)
    {
        //
    }

    /**
     * Handle the post "force deleted" event.
     *
     * @param  \App\Post  $post
     * @return void
     */
    public function forceDeleted(Post $post)
    {
        //
    }
}
