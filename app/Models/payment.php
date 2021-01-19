<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
  
    use HasFactory;
    protected $table='payment';
    protected $fillable=[       
        'id_user',
        'payment_method',
        'shipping_unit',
        'note',
        'address',
        'status',
        'cart',

    ];
}
