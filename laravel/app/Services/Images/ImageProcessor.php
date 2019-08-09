<?php
namespace App\Services\Images;



use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager as Image;

class ImageProcessor {
    private $config;

    public function __construct(ImageConfig $config)
    {
        $this->config =$config;
    }

    /**
     * @param string $filePath
     * @return string
     */
    private function generatePictureName(string $filePath):string
    {
        return sprintf('%s%s',
            hash_file('md5',$filePath),
            hash('md5',dechex(time()))
        );
    }

    /**
     * @param UploadedFile $file
     * @return bool|string
     */
    public function saveImage(UploadedFile $file)
    {
        $fileName=$this->generatePictureName($file->getPathname()).".".$file->guessClientExtension();
        if($file->storeAs($this->config::getImagePath(), $fileName)){
            return $fileName;
        }
        return false;
    }

    /**
     * @param string $fileName
     */
    public function saveThumbnail(string $fileName){
        $image = new Image();
        $imageData = $image->make(storage_path('app/'.$this->config->getImagePath().$fileName));

        $imageData->fit($this->config->getThumbnailSize());
        $imageData->save(storage_path('app/'.$this->config::getThumbnailPath().$fileName));
    }

}
