<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'quantity', 'total', 'status'
    ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

    // In Order.php
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    

public function customer()
{
    return $this->belongsTo(User::class, 'user_id');
} 

public function deliveryPerson()
{
    return $this->belongsTo(User::class, 'delivery_person_id');
}

}
