<?php

namespace App\Http\Controllers;

use App\Services\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    protected $media;

    public function __construct(Media $media)
    {
        $this->media = $media;
    }

    public function getMedias()
    {
        return $this->media->getMedias();
    }

    public function uploadImage(Request $request)
    {
        $result = $this->media->uploadImage($request);
        return response()->json($result);
    }
}
