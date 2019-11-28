<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ctdh extends Model
{
    protected $table = 'ctdh';

    public function sanpham(){
        return $this->belongsTo('App\Sanpham', 'masp', 'masp');
    }

    public function donhang(){
        return $this->belongsTo('App\Donhang', 'madh', 'madh');
    }
}
