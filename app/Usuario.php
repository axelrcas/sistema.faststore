<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'correo', 'usuario','nombre','contrasenia'
    ];

    protected $hidden = [
        'contrasenia'
    ];
}
