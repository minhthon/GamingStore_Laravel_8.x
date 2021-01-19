<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table='Cart';
    protected $fillable=[
        'name',
        'price',
        'image',
        'status',
    ];
    public function Cart(){
        return $this->belongsTo('App\Models\CartModel','id');
    }
}
