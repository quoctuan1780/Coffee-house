<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    protected $table = "sanpham";

    public function loaisanpham(){
        return $this->belongsTo('App\Loaisanpham', 'maloaisp', 'maloaisp');
    }

    public function cthd(){
        return $this->hasMany('App\Cthd', 'masp', 'masp');
    }
}
