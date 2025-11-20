<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'page',
        'ip',
        'user_agent',
        'referrer',
        'session_id',
        'event_type',
        'event_label',
    ];

   
}
