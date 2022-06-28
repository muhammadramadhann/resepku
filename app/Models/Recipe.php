<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    protected $fillable = [
        'user_id',
        'identifier',
        'title',
        'description',
        'ingredients',
        'cooking_steps',
        'image',
        'likes'
    ];
}
