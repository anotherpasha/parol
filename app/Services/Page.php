<?php

namespace App\Services;

use App\Models\Post as PostModel;
use App\Services\Post;
use Carbon\Carbon;

class Page
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    use DatatableParameters, Sluggable;

    protected $baseUrl = 'pages';
    protected $postTypeId = 2;

    public function datatable()
    {
        $data = $this->getList();
        $actions = $this->actionParameters([
            'posts.edit' => 'edit',
            'posts.delete' => 'delete'
        ]);

        return (new DatatableGenerator($data))
            ->addActions($actions)
            ->generate();
    }

    public function getList($params = [])
    {
        return PostModel::where('post_type_id', $this->postTypeId)
            ->with('localeTranslations')
            ->get();
    }

    public function store($request)
    {
        $post = $this->post->create($this->postTypeId, $request->publish_date);

        $this->post->addTranslation($post, $request->only(['title','excerpt','content','page_title','meta_description']));

        $metas = [
            'testkey' => [
                'en' => 'testkey en',
                'id' => 'testkey id'
            ]
        ];
        $this->post->addMeta($post, $metas);

        // return $post;
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
