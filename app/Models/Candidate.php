<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'apellidos',
        'ci',
        'resumen',
        'email',
        'telefono1',
        'telefono2',
        'estado_id',
        'cv',
    ];

    protected $hidden = [
        'password',

    ];

    public function estado()
    {
        return $this->belongsTo('App\Models\Estado');
    }
 
    /*  public function grado()
    {
        return $this->belongsTo('App\Models\Grado');
    }     */
    //Relacion m-m
    public function technologies()
    {
        return $this->belongsToMany('App\Models\Technology');
    }

    //Relacion uno a muchos (inversa)

}
