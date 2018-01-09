<?php

use Illuminate\Contracts\Routing\UrlGenerator;


if (! function_exists('backendRedirect')) {
    /**
     * Get an instance of the redirector.
     *
     * @param  string|null  $to
     * @param  int     $status
     * @param  array   $headers
     * @param  bool    $secure
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    function backendRedirect($to = null, $status = 302, $headers = [], $secure = null)
    {
        if (is_null($to)) {
            return app('redirect');
        }
        $adminPrefix = config('misc.admin-prefix');
        $to = $adminPrefix . '/' . $to;
        return app('redirect')->to($to, $status, $headers, $secure);
    }
}

if (! function_exists('backendUrl')) {
    /**
     * Generate a url for the application.
     *
     * @param  string  $path
     * @param  mixed   $parameters
     * @param  bool    $secure
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function backendUrl($path = null, $parameters = [], $secure = null)
    {
        if (is_null($path)) {
            return app(UrlGenerator::class);
        }
        $adminPrefix = config('misc.admin-prefix');
        $path = $adminPrefix . '/' . $path;
        return app(UrlGenerator::class)->to($path, $parameters, $secure);
    }
}

if (! function_exists('getMetaValue')) {
    function getMetaValue($postId, $metaKey, $lang = '') {
        $lang = $lang != '' ? $lang : config('app.locale');
        $postMeta = \DB::table('post_metas AS pm')
            ->join('post_meta_translations AS pmt', 'pm.id', '=', 'pmt.post_meta_id')
            ->where('pm.post_id', $postId)
            ->where('pm.meta_key', $metaKey)
            ->where('pmt.locale', $lang)
            ->select('pmt.value AS meta_value')
            ->first();
        if ($postMeta->meta_value) {
            return $postMeta->meta_value;
        }
        return '';
    }
}

if (! function_exists('getMedia')) {
    function getMedia($postId, $type) {
        $media = \App\Models\Media::whereHas('posts', function ($query) use ($postId) {
            $query->where('posts.id', $postId);
        })->where('type', $type);
        if ($media->exists()) {
            return $media->first();
        }
        return '';
    }
}

if (! function_exists('changeDateFormat')) {
    function changeDateFormat($date, $from = 'Y-m-d H:i:s', $to = 'd-m-Y') {
        return \Carbon\Carbon::createFromFormat($from, $date)->format($to);
    }
}

if (! function_exists('getAge')) {
    function getAge($birthDate, $birthDateFormat = 'Y-m-d') {
        return \Carbon\Carbon::createFromFormat($birthDateFormat, $birthDate)->diff(\Carbon\Carbon::now())->format('%y tahun');
    }
}

if (! function_exists('getTransOptions')) {
    function getTransOptions() {
        return \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getLocalesOrder();
    }
}

if (! function_exists('getDefaultLocale')) {
    function getDefaultLocale() {
        return LaravelLocalization::getDefaultLocale();
    }
}


if (! function_exists('getDefaultLocaleName')) {
    function getDefaultLocaleName() {
        $default = LaravelLocalization::getDefaultLocale();
        return LaravelLocalization::getSupportedLocales()[$default]['name'];
    }
}


if (! function_exists('getUniqueFileName')) {
    function getUniqueFilename(\Illuminate\Http\UploadedFile $file, $folder) {
        $imageName = $file->getClientOriginalName();
        $imageName = str_replace(' ', '-', $imageName);
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