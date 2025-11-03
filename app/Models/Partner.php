<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

   public function tags()
    {
        return $this->belongsToMany(Tag::class, 'partner_tag', 'partner_id', 'tag_id');
    }
}