<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherModel extends Model
{
    use HasFactory;
    protected $table='other';
    protected $fillable=[
       'id_payment',
        'status',
    ];
    public function Other(){
        return $this->belongsTo('App\Models\OtherModel','id');
    }
}
