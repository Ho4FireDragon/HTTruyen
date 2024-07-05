<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binhluan extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'tieude', 'noidung', 'user_id', 'create_at', 'updated_at', 'chuong_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'binhluan';
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function chuong() {
        return $this->belongsTo('App\Models\Chuong', 'chuong_id', 'id');
    }
}
