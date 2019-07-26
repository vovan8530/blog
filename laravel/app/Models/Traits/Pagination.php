<?php

namespace app\Models\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

trait Pagination {
    /**
     * @param Builder $query
     * @param array $params
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function addPagination(Builder $query, array $params):LengthAwarePaginator
    {
        return $query->paginate(config('config.perPage', 15))
            ->appends($params);
    }
}
