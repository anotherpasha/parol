<?php

namespace App\Models;

use App\Models\Slider;
use App\Models\SliderImageTranslation;
use Illuminate\Database\Eloquent\Model;

class SliderImage extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function slider()
    {
        return $this->belongsTo(Slider::class);
    }

    public function translations()
    {
        return $this->hasMany(SliderImageTranslation::class);
    }
}
