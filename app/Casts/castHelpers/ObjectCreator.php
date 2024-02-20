<?php

namespace App\Casts\castHelpers;

class ObjectCreator
{
    public $English = '';
    public $Farsi = '';
    public $id = 0;

    public function __construct($id , $en , $fa)
    {
        $this->id=$id;
        $this->English=$en;
        $this->Farsi=$fa;
        return $this;

    }
}
