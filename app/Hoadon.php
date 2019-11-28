<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hoadon extends Model
{
    protected $table = "hoadon";

    public function cthd(){
        return $this->hasMany('App\Cthd', 'mahd', 'mahd');
    }

    public function khachhang(){
        return $this->belongsTo('App\Khachhang', 'makh', 'makh');
    }
}
