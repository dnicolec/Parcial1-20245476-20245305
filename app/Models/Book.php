<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'isbn',
        'total_copies',
        'available_copies',
        'is_available',
        ];
}