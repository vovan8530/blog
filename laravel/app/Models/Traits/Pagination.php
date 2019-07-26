<?php

namespace app\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Pagination {
    public function addPagination(Builder $query, array $params){
        return $query->paginate(config('config.perPage', 15))
            ->appends($params);
    }
}
