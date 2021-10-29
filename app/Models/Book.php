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

    public function categories()
    {
        return $this->belongsToMany(Category::class,'book_categories');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'giver_id');
    }
}
