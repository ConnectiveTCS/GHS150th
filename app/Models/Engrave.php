<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Engrave extends Model
{
    //
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'phone', 'message'];
}
