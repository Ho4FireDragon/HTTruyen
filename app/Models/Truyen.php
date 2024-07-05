<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'tentruyen', 'kichhoat', 'slug_truyen', 'hinhanh', 'tomtat', 'theloai_id', 'tacgia', 'luotxem', 'slug_tacgia', 'tukhoa', 'luotxem'
    ];
    protected $primaryKey = 'id';
    protected $table = 'truyen';
    // 1 truyen thuoc 1 danh muc
    public function theloaitruyen() {
        return $this->belongsTo('App\Models\TheloaiTruyen', 'theloai_id', 'id');
    }
    public function chuong() {
        return $this->hasMany('App\Models\Chuong', 'truyen_id', 'id');
    }
}
