<?php

namespace App\Services;

use App\Models\Slider as SliderModel;
use Illuminate\Support\Facades\File;


class Slider
{
    use DatatableParameters;

    protected $baseUrl = 'sliders';
    protected $undeletableIds = [];

    public function datatable()
    {
        $data = SliderModel::all();
        $actions = $this->actionParameters([
            'sliders.edit' => 'edit',
        ]);

        $delete = [
            'title'     => 'Delete',
            'whereClause' => function ($collection) {
                if (in_array($collection->id, $this->undeletableIds)) {
                    return false;
                }
                return true;
            },
            'link'      => backendUrl($this->baseUrl . '/%s/delete'),
            'class'     => 'uk-label uk-text-capitalize red',
            'icon'      => 'fa fa-fw fa-times-circle',
        ];

        if (auth()->user()->can('sliders.delete')) {
            $actions['delete'] = $delete;
        }

        return (new DatatableGenerator($data))
            ->addActions($actions)
            ->generate();
    }

    public function getQuery($params = [])
    {
        $galleries = SliderModel::getQuery();
        if (isset($params['gallery_type'])) {
            $galleries->where('gallery_type', $params['gallery_type']);
        }
        if (isset($params['ids'])) {
            $galleries->whereIn('id', $params['ids']);
        }
        return $galleries;
    }

    public function getSliderById($id)
    {
        return SliderModel::find($id);
    }

    public function store($request)
    {
        $name = $request->gallery_name;
        $images = $request->galleries;

        try {
            $gallery = SliderModel::create([
                'title' => $name
            ]);

            $this->storeDetail($gallery, $images);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function update($request, $id)
    {
        $name = $request->gallery_name;
        $images = $request->galleries;

        try {
            $gallery = $this->getSliderById($id);
            $gallery->title = $name;
            $gallery->save();

            $this->updateDetail($gallery, $images);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function destroy($id)
    {
        if (! in_array($id, $this->undeletableIds)) {
            return SliderModel::destroy($id);
        }
    }

    private function storeDetail($gallery, $details)
    {
        $langs = getTransOptions();

        foreach ($details as $order => $detail) {
            // image
            if (isset($detail['image'])) {
                $imageFile = $detail['image'];
                $folder = 'galleries';
                $fileName = $this->uploadImage($imageFile, $folder);
                $path = $imageFile->storeAs($folder, $fileName);
                $path = 'uploads/' . $path;
                $galleryImage = $gallery->images()->create([
                    'file_name' => $fileName,
                    'file_path' => $path,
                    'file_fullpath' => url($path),
                    'order' => $order
                ]);

                // title & content
                foreach ($langs as $lang => $langDetail) {
                    $title = isset($detail['image_title-' . $lang]) ? $detail['image_title-' . $lang] : '';
                    $content = isset($detail['image_content-' . $lang]) ? $detail['image_content-' . $lang] : '';
                    $galleryImage->translations()->create([
                        'lang' => $lang,
                        'title' => $title,
                        'content' => $content
                    ]);
                }
            }
        }
    }

    private function uploadImage($imageFile, $folder)
    {
        if (! File::exists(public_path($folder))) {
            File::makeDirectory(public_path($folder), 0775, true, true);
        }
        $fileName = getUniqueFilename($imageFile, $folder);
        return $fileName;
    }

    private function updateDetail($gallery, $details)
    {
        $langs = getTransOptions();

        // check deleted items
        if (count($gallery->images) > 0) {
            foreach ($gallery->images as $image) {
                if (! array_key_exists($image->order, $details)) {
                    $image->delete();
                }
            }
        }

        foreach ($details as $order => $detail) {
            // image
            if (isset($detail['image'])) {
                $imageFile = $detail['image'];
                $folder = 'galleries';
                $fileName = $this->uploadImage($imageFile, $folder);
                $path = $imageFile->storeAs($folder, $fileName);
                $path = 'uploads/' . $path;
                $gallery->images()->where('order', $order)->delete();
                $gallery->images()->create([
                    'file_name' => $fileName,
                    'file_path' => $path,
                    'file_fullpath' => url($path),
                    'order' => $order
                ]);
            }

            // title & content
            foreach ($langs as $lang => $langDetail) {
                $title = isset($detail['image_title-' . $lang]) ? $detail['image_title-' . $lang] : '';
                $content = isset($detail['image_content-' . $lang]) ? $detail['image_content-' . $lang] : '';
                $galleryImage = $gallery->images()->where('order', $order)->first();
                $galleryImage->translations()->where('lang', $lang)->delete();
                $galleryImage->translations()->create([
                    'lang' => $lang,
                    'title' => $title,
                    'content' => $content
                ]);
            }
        }
    }

    protected function storeTranslation($gallery, $data)
    {
        $langs = getTransOptions();
        foreach ($langs as $lang => $details) {
            $title = isset($data['title'][$lang]) ? $data['title'][$lang] : '';
            $desc = isset($data['description'][$lang]) ? $data['description'][$lang] : '';
            $params = [
                'locale' => $lang,
                'title' => $title,
                'description' => $desc
            ];
            $gallery->addTranslation($params);
        }
    }

    protected function updateTranslation($gallery, $data)
    {
        $gallery->translations()->delete();
        $this->storeTranslation($gallery, $data);
    }

    public function findByIds($ids)
    {
        return SliderModel::whereIn('id', $ids)->get();
    }
}
