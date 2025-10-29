<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aliado extends Model
{
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'imagen',
        'user_id',
    ];
}