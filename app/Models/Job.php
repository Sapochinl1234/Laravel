<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_list';

    protected $fillable = [
        'title',
        'company',
        'location',
        'industry',
        'details',
        'salary',
        'experience',
        'company_id',
        'created_at',
        'updated_at'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tag', 'job_id', 'tag_id');
    }

    public function companyRelation()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}