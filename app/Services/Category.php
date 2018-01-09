<?php


namespace App\Services;

use App\Models\Category as CategoryModel;

class Category
{
    use DatatableParameters, Sluggable;

    protected $baseUrl = 'categories';

    public function datatable($postType)
    {
        $this->baseUrl = 'categories/' . $postType->id;
        $data = $this->getList([
            'post_type_id' => $postType->id
        ]);
        $actions = $this->actionParameters([
            'categories.edit' => 'edit',
            'categories.delete' => 'delete'
        ]);

        return (new DatatableGenerator($data))
            ->addActions($actions)
            ->generate();
    }

    public function getList($params = [])
    {
        $cat = CategoryModel::query();
        if (isset($params['post_type_id'])) {
            $cat = $cat->where('post_type_id', $params['post_type_id']);
        }
        return $cat->get();
    }

    public function store($request, $postType)
    {
        $cat = \App\Models\Category::create([
            'post_type_id' => $postType->id,
            'slug' => ''
        ]);

        $sluggedTitle = '';
        foreach ($request->title as $locale => $title) {
            if ($locale == getDefaultLocale()) {
                $sluggedTitle = $title;
            } else {
                $sluggedTitle = $sluggedTitle == '' ? $title : $sluggedTitle;
            }

            $title = ($title == '') ? $request->title[getDefaultLocale()] . ' - ['. $locale .']' : $title;
            $cat->addTranslation([
                'locale' => $locale,
                'title' => $title
            ]);
        }

        $slug = $this->generateSlug($sluggedTitle, \App\Models\Category::class);
        $cat->update([
            'slug' => $slug
        ]);

        return $cat;
    }

    public function update($request, $category)
    {
        $category->translations()->delete();

        $sluggedTitle = '';
        foreach ($request->title as $locale => $title) {
            if ($locale == getDefaultLocale()) {
                $sluggedTitle = $title;
            } else {
                $sluggedTitle = $sluggedTitle == '' ? $title : $sluggedTitle;
            }
            $title = ($title == '') ? $request->title[getDefaultLocale()] . ' - ['. $locale .']' : $title;
            $category->addTranslation([
                'locale' => $locale,
                'title' => $title
            ]);
        }

        $slug = $this->generateSlug($sluggedTitle, \App\Models\Category::class);
        $category->update([
            'slug' => $slug
        ]);

        return $category;
    }


}