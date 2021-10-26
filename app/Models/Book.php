<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'author',
        'available',
        'giver_id',
        'image',
    ];

    protected $attributes = [
        'views' => 0,
    ];
}
