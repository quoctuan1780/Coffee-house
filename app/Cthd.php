<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cthd extends Model
{
    protected $table = "cthd";

    public function sanpham(){
        return $this->belongsTo('App\Sanpham', 'masp', 'masp');
    }

    public function hoadon(){
        return $this->belongsTo('App\Hoadon', 'mahd', 'mahd');
    }
}
