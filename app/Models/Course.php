<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $fillable = ['title_en', 'title_ar'];
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
