<?php

namespace App\Services\GetApiData;

use GuzzleHttp\Client;

class  GuzzleConfig {
    protected $client;
    protected $base_uri;
    public function __construct($base_uri)
    {
        $this->base_uri = $base_uri;
    }
    public function config(){
        $this->client = new Client(['base_uri' => $this->base_uri]);
        return $this->client;
    }
}
