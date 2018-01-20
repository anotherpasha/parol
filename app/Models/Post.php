<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function translations()
    {
        return $this->hasMany(PostTranslation::class);
    }

    public function metas()
    {
        return $this->hasMany(PostMeta::class);
    }

    public function medias()
    {
        return $this->belongsToMany(Media::class, 'post_has_medias');
    }

    public function productSections()
    {
        return $this->hasMany(PostProductSection::class);
    }

    public function localeTranslations($locale = '')
    {
        $locale = ($locale != '') ? $locale : getDefaultLocale();
        return $this->hasMany(PostTranslation::class)->where('locale', $locale);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function addTranslation($translation)
    {
        return $this->translations()->create($translation);
    }

    public function addMeta($meta)
    {
        return $this->metas()->create($meta);
    }

    public function addProductSection($section)
    {
        return $this->productSections()->create($section);
    }
}
