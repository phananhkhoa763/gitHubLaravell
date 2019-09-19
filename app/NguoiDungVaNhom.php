<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class NguoiDungVaNhom extends Model
{
   use SoftDeletes;
   public function user()
   {
      return $this->belongsTo('App\User', 'id_user','id');
   }
   public function Nhom()
   {
      return $this->belongsTo('App\Nhom', 'id_nhom','id');
   }
    static function deleteByUserid($userId)
   {
     DB::select('delete from nguoi_dung_va_nhoms where id_user = ?', [$userId]);
   }
    static function deleteByNhomid($nhomId)
   {
     DB::select('delete from nguoi_dung_va_nhoms where id_nhom = ?', [$nhomId]);
   }
}
