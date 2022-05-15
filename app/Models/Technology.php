<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    //Relacion m-m
    public function candidates()
    {
        return $this->belongsToMany('App\Models\Candidate');
    }
}
