<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    //
    protected $fillable = ['title_en', 'title_ar', 'description_en', 'description_ar', 'images'];

    protected $casts = [
        'images' => 'array',
    ];
}
