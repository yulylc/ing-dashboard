<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'apellido1',
        'apellido2',
        'email',
    ];

    //Relacion m-m
    public function technologies()
    {
        return $this->belongsToMany('App\Models\Technology');
    }
}
