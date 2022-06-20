<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SanPham;

class WishList extends Model
{
    protected $table = 'wishlist';
    protected $fillable = [
        'user_id',
        'product_id',
   
    
    ];
    public function getProduct(){
        return $this->belongsTo(ModelSP::class,'product_id','id');
    }

}