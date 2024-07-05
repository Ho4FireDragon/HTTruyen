<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheloaiTruyen extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tentheloai', 'kichhoat', 'slug_theloai'
    ];
    protected $primaryKey = 'id';
    protected $table = 'theloai';

    // 1 danh muc co nhieu truyen
    public function truyen() {
        return $this->hasMany('App\Models\Truyen');
    }
}
