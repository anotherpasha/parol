<?php

namespace App\Services;

use App\Models\Post as PostModel;
use Carbon\Carbon;

class Post
{
    use DatatableParameters, Sluggable;

    protected $baseUrl = 'posts';

    public function datatable($postTypeId, $baseUrl)
    {
        $this->baseUrl = $baseUrl;
        $data = $this->getList($postTypeId);
        $actions = $this->actionParameters([
            'posts.edit' => 'edit',
            'posts.delete' => 'delete'
        ]);

        return (new DatatableGenerator($data))
            ->addActions($actions)
            ->generate();
    }

    public function getList($postTypeId)
    {
        return PostModel::where('post_type_id', $postTypeId)
            ->with('localeTranslations')
            ->get();
    }

    public function store($request)
    {
        $user = auth()->user();
        $post = \App\Models\Post::create([
            'slug' => '',
            'post_type_id' => $request->post_type_id,
            'parent_id' => $request->has('parent_id') ? $request->parent_id : 0,
            'publish_date' => Carbon::createFromFormat('d/m/Y', $request->publish_date)->format('Y-m-d'),
            'created_by_id' => $user->id,
            'created_by' => $user->name
        ]);

        $sluggedTitle = '';
        foreach (getTransOptions() as $lang => $details) {
            $title = $request->title[$lang];
            $excerpt = $request->excerpt[$lang];
            $content = $request->content[$lang];
            $pageTitle = $request->page_title[$lang];
            $metaDesc = $request->meta_description[$lang];

            $excerpt = $this->generateExcerpt($excerpt, $content);

            if ($lang == getDefaultLocale()) {
                $sluggedTitle = $title;
            } else {
                $sluggedTitle = $sluggedTitle == '' ? $title : $sluggedTitle;
            }
            $title = ($title == '') ? $request->title[getDefaultLocale()] . ' - ['. $lang .']' : $title;

            $post->addTranslation([
                'locale' => $lang,
                'title' => $title,
                'excerpt' => $excerpt,
                'content' => $content,
                'page_title' => $pageTitle,
                'meta_description' => $metaDesc
            ]);
        }

        $slug = $this->generateSlug($sluggedTitle, \App\Models\Post::class);
        $post->slug = $slug;
        $post->save();

        return $post;

    }

    public function update($request, $post)
    {
        $post->translations()->delete();

        $sluggedTitle = '';
        foreach (getTransOptions() as $lang => $details) {
            $title = $request->title[$lang];
            $excerpt = $request->excerpt[$lang];
            $content = $request->content[$lang];
            $pageTitle = $request->page_title[$lang];
            $metaDesc = $request->meta_description[$lang];

            $excerpt = $this->generateExcerpt($excerpt, $content);

            if ($lang == getDefaultLocale()) {
                $sluggedTitle = $title;
            } else {
                $sluggedTitle = $sluggedTitle == '' ? $title : $sluggedTitle;
            }
            $title = ($title == '') ? $request->title[getDefaultLocale()] . ' - ['. $lang .']' : $title;

            $post->addTranslation([
                'locale' => $lang,
                'title' => $title,
                'excerpt' => $excerpt,
                'content' => $content,
                'page_title' => $pageTitle,
                'meta_description' => $metaDesc
            ]);
        }

        $slug = $this->generateSlug($sluggedTitle, \App\Models\Post::class);
        $post->slug = $slug;
        $post->publish_date = Carbon::createFromFormat('d/m/Y', $request->publish_date)->format('Y-m-d');
        $post->save();

        return $post;
    }

    /**
     * @param $excerpt
     * @param $content
     * @return string
     */
    protected function generateExcerpt($excerpt, $content)
    {
        $excerpt = ($excerpt == '') ? strip_tags($content) : $excerpt;
        if (strlen($excerpt) > 255) {
            $excerpt = substr($excerpt, 0, 252) . '&hellip;';
            return $excerpt;
        }
        return $excerpt;
    }
}
