<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [

    'user_id',

    'name',
    'email',
    'phone',

    'address',
    'city',
    'state',
    'pincode',

    'subtotal',
    'total',

    'payment_method',

    'payment_status',
    'order_status',

];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}