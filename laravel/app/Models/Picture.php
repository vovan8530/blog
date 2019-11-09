<?php

namespace App\Models;

use app\Models\Traits\Pagination;
use App\Services\Images\ImageConfig;
use App\Services\Images\ImageProcessor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;



class Picture extends Model
{
    use Pagination;

    protected $fillable=['path','thumbnail'];

    /**
     * @param UploadedFile $file
     * @param ImageConfig $config
     * @return bool
     */
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

    public function getAll(Request $request){
        $query=$this->query();
        return $this->addPagination($query, $request->query());
    }
}
