<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khachhang extends Model
{
    protected $table = "khachhang";

    public function bill(){
        return $this->hasMany('App\Hoadon', 'makh', 'makh');
    }
}
