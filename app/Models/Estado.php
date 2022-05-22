<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

    ];

    //Relacion uno a muchos
    public function candidates()
    {
        return $this->hasMany('App\Models\Candidate');
    }
}
