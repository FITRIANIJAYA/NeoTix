<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tickets extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'event_id',
        'available_quota',
        'price',
        'is_active',   
    ];
}

