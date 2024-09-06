<?php

//Choong Kah Chay

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'total',
        'Quantity',
        'product',
        'firstname',
        'lastname',
        'address',
        'city',
        'state',
        'postcode',
        'phone',
        'email',
    ];
}
