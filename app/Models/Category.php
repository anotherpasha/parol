<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $with = ['localeTranslations'];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function localeTranslations($locale = '')
    {
        $locale = ($locale != '') ? $locale : getDefaultLocale();

        return $this->hasMany(CategoryTranslation::class)->where('locale', $locale);
    }

    public function addTranslation($translation)
    {
        $translation = $this->translations()->create($translation);

        return $translation;
    }
}
