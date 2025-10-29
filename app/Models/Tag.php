<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['name'];

    // Relación inversa muchos a muchos con empleos
    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_tag', 'tag_id', 'job_id');
    }
}