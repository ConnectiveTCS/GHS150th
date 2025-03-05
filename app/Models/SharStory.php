<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SharStory extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'class_of', 'message'];
}
