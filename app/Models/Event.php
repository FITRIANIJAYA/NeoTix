<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'organizer_id',
        'name',
        'description',
        'event_date',
        'event_time',
        'location',
        'image',
        'quota',
        'price',
        'category',
        'status',
        'average_rating',
        'total_reviews',
    ];

    public function tickets()
    {
        return $this->hasMany(Tickets::class);
    }
}