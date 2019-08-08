<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    const PICTURE_PATH = "storage/images/";

    protected $fillable=['path','thumbnail'];

    public function insertPicture($file){
        if($file->storeAs('public/images', $file->getClientOriginalName())){
            $this->create([
                'path' => static::PICTURE_PATH . $file->getClientOriginalName(),
                'thumbnail' => static::PICTURE_PATH . $file->getClientOriginalName()
            ]);
            return true;
        }
        return false;
    }
}
