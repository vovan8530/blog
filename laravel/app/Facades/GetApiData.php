<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class GetRickAndMortyApiData extends Facade {
    protected static function getFacadeAccessor()
    {
    return 'GetRickAndMortyApiData';
    }
}
