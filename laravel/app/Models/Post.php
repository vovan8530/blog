<?php

namespace App\Models;

use App\Models\Traits\Pagination;
use App\Models\Traits\Search;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class Post extends Model
{
    use Pagination, Search;

    private $searchFields = [
        'title', 'body',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * @return BelongsTo
     */
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param Request $request
     * @return LengthAwarePaginator
     */
    public function getAll(Request $request):LengthAwarePaginator
    {

        return $this->addPagination($this->addSearch($this->with('user'),
            $request->query()),
            $request->query());
    }
}
