<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $keyType = 'str';
    protected $primaryKey='slug';
}
