<?php

namespace App\Mail;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $post;

    /**
     * PostCreated constructor.
     * @param $post
     */
    public function __construct(Post $post)
    {
        $this->post=$post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('from@test.com')
            ->to('to@test.com')
            ->view('mails.created_post',[
                'post' =>  $this->post,
            ])
            ->attach(storage_path('/app/public/images/2e0655c7d27da8cd7c44c796ae51b3b3965c083b6b9327cd2a14d06d3fae565c.jpeg'));
    }
}
