<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'author',
        'publisher',
        'Publication',
        'Price',
        'Quantity',
        'Category_id'
    ];
}
