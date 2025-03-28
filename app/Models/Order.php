<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'buyer_name', 'email', 'phone', 'address', 'total_price', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
    }

    public function orders()
{
    return $this->belongsToMany(Order::class, 'order_product')->withPivot('quantity');
}


    
}

