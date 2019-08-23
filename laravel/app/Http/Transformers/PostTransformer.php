<?php

namespace App\Http\Transformers;

use App\Models\User;

class PostTransformer extends ModelTransformer{
    public function toArray(){
        return [
            'title' => $this->getPropertyValue('title'),
            'body' => $this->getPropertyValue('body'),
            'author' => ($this->getPropertyValue('user'))->name,
            'now' => now()->addDay(10),
            'user' => User::find(1)->name
        ];
    }
}
