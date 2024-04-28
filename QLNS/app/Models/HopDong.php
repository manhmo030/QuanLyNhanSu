<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HopDong extends Model
{
    use HasFactory;
    protected $table = 'hopdong';

    public $timestamps = false;
    // protected $fillable = ['email', 'password', 'name', 'phone', 'avatar'];
}
