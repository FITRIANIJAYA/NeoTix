<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $filable = [
        'user_id',
        'event_id',
        'rating',
        'review',
    ];
}
