<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostMetaTranslation extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;

    public function postMeta()
    {
        return $this->belongsTo(PostMeta::class);
    }
}
