<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 
class KhachHang extends Authenticatable
{
    use HasFactory;
    protected $table = 'khach_hang';
    protected $fillable = [
        'ten_tk',
        'mat_khau',
        'email',
        'gioi_tinh',
        'dia_chi',
        'ho_ten',
        'sdt',
        'trang_thai',
        'ngay_sinh'
    ];
}

//dang ky em tu tao 