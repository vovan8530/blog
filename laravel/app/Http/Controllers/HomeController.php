<?php

namespace App\Http\Controllers;


use App\Facades\GetRickAndMortyApiData;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {
       return view('home');
//        return GetRickAndMortyApiData::getCharacter();//test custom facade
    }
}
