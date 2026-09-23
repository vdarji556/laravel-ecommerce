<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class User extends Model
{
   protected $fillable = [
    'name',
    'email',
    'phone',
    'password',
    'type',
];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
