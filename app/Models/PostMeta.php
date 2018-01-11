<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMeta extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function translations()
    {
        return $this->hasMany(PostMetaTranslation::class);
    }

    public function localeTranslations($locale = '')
    {
        $locale = ($locale != '') ? $locale : getDefaultLocale();
        return $this->hasMany(PostMetaTranslation::class)->where('locale', $locale);
    }

    public function addTranslation($translation)
    {
        $translation = $this->translations()->create($translation);
        return $translation;
    }
}
