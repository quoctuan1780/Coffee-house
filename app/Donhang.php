<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table = 'donhang';

    public function ctdh(){
        return $this->hasMany('App\Ctdh', 'madh', 'madh');
    }

    public function khachhang(){
        return $this->belongsTo('App\Khachhang', 'makh', 'makh');
    }
}
