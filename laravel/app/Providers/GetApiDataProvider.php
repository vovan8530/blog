<?php

namespace App\Providers;

use App\Services\GetApiData\GetRickAndMortyApiData;
use Illuminate\Support\ServiceProvider;

class GetApiDataProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind('GetRickAndMortyApiData', function (){
            return  new GetRickAndMortyApiData;
        });
    }
}
