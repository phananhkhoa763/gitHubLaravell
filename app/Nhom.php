<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Nhom extends Model
{
    use SoftDeletes;
    public function User()
    {
        return $this->belongsToMany('App\User');
    }
    public function NguoiDungVaNhom()
    {
        return $this->hasMany('App\NguoiDungVaNhom','id_nhom','id');
    }
}
