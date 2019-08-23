<?php

namespace App\Http\Transformers;

use Illuminate\Database\Eloquent\Model;

interface TransformerInterface{

    public function toArray();

    public function toJson();

    public function toString();

    public function __toString();

    public function getPropertyValue(string $propName);

    public function setData(Model $data);
}
