<?php

namespace App\Http\Controllers\Admin;

use App\Models\Picture;
use App\Services\Images\ImageConfig;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PictureController extends Controller
{
    /**
     * @param Request $request
     * @param Picture $pictures
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Picture $pictures)
    {
        return view('admin.pictures.index',[
            'pictures' => $pictures->getAll( $request),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pictures.create');
    }

    /**
     * @param Request $request
     * @param Picture $picture
     * @param ImageConfig $config
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Picture $picture, ImageConfig $config)
    {
        if($request->has('file')){
            $picture->insertPicture($request->file('file'), $config);
        }
        return redirect()->route('admin.pictures.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Picture  $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * @param Picture $picture
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Picture $picture)
    {
//        $picture->delete();
//        return redirect()->route('admin.pictures.index');
    }
}

