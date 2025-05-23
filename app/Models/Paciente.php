<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = [
        'nombre', 'apellido', 'telefono', 'email', 'fecha_nacimiento', 'password'
    ];
    protected $hidden = ['password'];
}
