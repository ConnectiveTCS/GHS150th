<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCards extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = [
        'project_id',
        'image',
        'title',
        'description',
        'status',
        'position',
        'completion_percentage',
        'project_timeline',
    ];
}
