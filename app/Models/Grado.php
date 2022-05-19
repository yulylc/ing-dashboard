<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;

        //Relacion uno a muchos
        public function candidates()
        {
            return $this->hasMany('App\Models\Candidate');
        }
}

