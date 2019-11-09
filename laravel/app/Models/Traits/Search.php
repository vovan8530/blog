<?php

 namespace app\Models\Traits;

 use Illuminate\Database\Eloquent\Builder;

 trait Search{

     /**
      * @param Builder $query
      * @param array $params
      * @return Builder
      */
    public function addSearch(Builder $query, array $params):Builder
    {
        if(isset($params['search'])){
            $search = $params['search'];
            $query->where(function($query) use($search){
                foreach ($this->searchFields as $field ){
                    $query->orWhere($field, 'like',"%{$search}%");
            }
            }  );

        }
        return $query;
    }
 }
