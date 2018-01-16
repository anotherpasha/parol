<?php

namespace App\Models;

use App\Models\SliderImage;
use Illuminate\Database\Eloquent\Model;

class SliderImageTranslation extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function sliderImage()
    {
        return $this->belongsTo(SliderImage::class);
    }
}
