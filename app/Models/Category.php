<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
        'slug',
        'is_active',
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->title_ar
            : $this->title_en;
    }
    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar'
            ? $this->description_ar
            : $this->description_en;
    }
}
