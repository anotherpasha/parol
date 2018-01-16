<?php

namespace App\Services;

use App\Models\Media as MediaModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Media
{
    protected $media;

    public function __construct(MediaModel $media)
    {
        $this->media = $media;
    }

    public function getMedias()
    {
        return MediaModel::orderBy('id', 'desc')->simplePaginate(5);
    }

    public function uploadImage(Request $request)
    {
        $file = $request->file('file');
        $type = $request->has('type') ? $request->type : 'posts';
        $folder = $type;
        if (! File::exists(public_path($folder))) {
            File::makeDirectory(public_path($folder), 0775, true, true);
        }
        // generate filename
        $imageName = $this->getUniqueFileName($file, $folder);
        Log::warning($imageName);
        // $imagePath = $folder . '/' . $imageName;
        // Log::warning($imagePath);
        // $publicPath = public_path($imagePath);

        // save file to disk
        $path = $file->storeAs($folder, $imageName);
        $path = 'uploads/' . $path;
        Log::warning($path);

        // save to db
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        $media = $this->saveMedia($filename, $path, url($path), $type);

        return $media;
    }

    public function saveMedia($name, $path, $fullPath, $type = 'featured', $description = '')
    {
        $media = MediaModel::create([
            'title' => $name,
            'path' => $path,
            'fullpath' => $fullPath,
            'type' => $type,
            'description' => $description
        ]);
        return $media;
    }

    public function getUniqueFileName($file, $folder)
    {
        $imageName = $file->getClientOriginalName();
        $filename = pathinfo($imageName, PATHINFO_FILENAME);
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $sluggedFilename = str_slug($filename) . '.' . $extension;
        $imagePath = public_path($folder . '/' . $sluggedFilename);
        if (File::isFile($imagePath)) {
            $newFilename = $filename . '_' . strtotime(date('Y-m-d H:i:s'));
            return $newFilename . '.' . $extension;
        }
        return $sluggedFilename;
    }


}
