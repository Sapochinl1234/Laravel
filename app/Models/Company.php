<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // Nombre de la tabla (opcional si sigue la convención)
    protected $table = 'companies';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'name',
        'industry',
        'location',
        'description',
        'created_at',
        'updated_at'
    ];

    /**
     * Relación uno a muchos con empleos (Job)
     */
    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }
}