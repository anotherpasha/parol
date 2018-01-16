<?php

namespace App\Models;

use App\Models\SliderImage;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $guarded = ['id'];

    public function images()
    {
        return $this->hasMany(SliderImage::class);
    }
}
