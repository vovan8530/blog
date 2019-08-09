<?php

namespace App\Services\Images;

class ImageConfig {

    private const THUMBNAIL_SIZE=300;
    private const  PICTURE_URL = "storage/images/";
    private const  PICTURE_PATH = "public/images/";

    private const  THUMBNAIL_URL = "storage/thumbnail/";
    private const  THUMBNAIL_PATH = "public/thumbnail/";

    static public function getImageUrl(){
        return self::PICTURE_URL;
    }

    static public function getImagePath(){
        return self::PICTURE_PATH;
    }


    static public function getThumbnailUrl(){
        return self::THUMBNAIL_URL;
    }

    static public function getThumbnailPath(){
        return self::THUMBNAIL_PATH;
    }


    static public function getThumbnailSize(){
        return self::THUMBNAIL_SIZE;
    }



}
