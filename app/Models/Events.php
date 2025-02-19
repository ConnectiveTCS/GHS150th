<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    // Allow mass assignment on these fields
    protected $fillable = [
        'event_name',
        'event_description',
        'event_date',
        'event_location',
        'event_image'
    ];
}
