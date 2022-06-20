<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSP extends Model
{
    use HasFactory;
    protected $table = 'product_model';
    public function getpro()
    {
            return $this->hasMany(SanPham::class,'model_id','id');
    }
}
