<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'is_active',
    ];


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
