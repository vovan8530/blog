<?php

namespace App\Services\GetApiData;

class GetApiData{
    protected function getData($baseUri, $uri){
        $client = new GuzzleConfig($baseUri);
        $response = $client->config()->request('GET', $uri);
        return $response;
    }
}
