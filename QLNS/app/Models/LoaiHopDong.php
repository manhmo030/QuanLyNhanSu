<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiHopDong extends Model
{
    use HasFactory;
    protected $table = 'loaihopdong';
    protected $primaryKey = 'MaLoaiHD ';
    public $timestamps = false;
    protected $fillable = ['TenLoaiHD'];
}
