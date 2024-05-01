<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DangKyCaLam extends Model
{
    use HasFactory;

    protected $table = 'nhanvien_calam';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = ['MaNV', 'MaCa', 'date', 'sogiolamhanhchinh', 'sogiotangca'];

    public function nhanvien(){
        return $this->hasOne(NhanVien::class, 'MaNV', 'MaNV');
    }
}
