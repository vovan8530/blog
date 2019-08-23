<?php

namespace App\Http\Transformers;

use Illuminate\Database\Eloquent\Model;

class ModelTransformer implements TransformerInterface{

    protected $data;

    public function __construct(Model $data)
    {
        $this->setData($data);
    }

    public function setData(Model $data){
        $this->data = $data;
    }

    public function getPropertyValue(string $propName){
        if(isset($this->data->$propName)){
            return $this->data->$propName;
        }
        return null;
    }

    public function toArray(){
        return $this->data;
    }

    public function toJson(){
        return json_encode($this->toArray());
    }

    public function toString(){
        return $this->toJson();
    }

    public function __toString()
    {
        return $this->toString();
    }
}
