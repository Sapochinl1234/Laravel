<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Nombre personalizado de la tabla
    protected $table = 'job_list';

    // Campos que se pueden asignar masivamente
    protected $fillable = ['title', 'Salary', 'details'];

    // Relación muchos a muchos con etiquetas
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tag', 'job_id', 'tag_id');
    }

    public function company()
    {
    return $this->belongsTo(Company::class);
    }

}