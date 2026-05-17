<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
        'title',
        'alt',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }
}
