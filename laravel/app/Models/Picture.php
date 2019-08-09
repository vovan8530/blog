<?php

namespace App\Models;

use App\Services\Images\ImageConfig;
use App\Services\Images\ImageProcessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;



class Picture extends Model
{
    protected $fillable=['path','thumbnail'];

    public function insertPicture(UploadedFile $file, ImageConfig $config){

        $imageProcessor= new ImageProcessor($config);

        if($fileName = $imageProcessor->saveImage($file)){

            $imageProcessor->saveThumbnail($fileName);
            $this->create([
                'path' => $config::getImageUrl().$fileName,
                'thumbnail' => $config::getThumbnailUrl().$fileName,
            ]);

            return true;
        }
        return false;
    }
}
