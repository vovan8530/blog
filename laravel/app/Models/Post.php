<?php

namespace App\Models;

use App\Models\Traits\Pagination;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Post extends Model
{
    use Pagination;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @param Request $request
     * @return Post
     */
    public function getAll(Request $request):LengthAwarePaginator
    {
        return $this->addPagination($this->query(),$request->query());
    }
}
