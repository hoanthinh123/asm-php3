<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Perfume extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'description',
        'origin',
        'style',
        'price',
        'quantity',
        'release_date',
        'Category_id',
    ];
    public function Category(): BelongsTo{
        return $this->belongsTo(Category::class,'Category_id');
    }
}
