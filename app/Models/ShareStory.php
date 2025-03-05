<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShareStory extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'class_of', 'message'];
}
