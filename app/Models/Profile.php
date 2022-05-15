<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'resumen',
    ];

    public function user() {
        //relacion uno a uno
        return $this->belongsTo('App\Models\User'); 
    }

}
