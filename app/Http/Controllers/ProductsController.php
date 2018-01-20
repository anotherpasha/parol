<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post as PostModel;
use App\Services\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductsController extends Controller
{
    /**
     * @var Post
     */
    private $post;
    protected $postTypeId = 4;

    /**
     * PostsController constructor.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $data['pageTitle'] = 'Product';
        return view('admin.products.index', $data);
    }

    public function datatableList()
    {
        return $this->post->datatable($this->postTypeId, 'product');
    }

    public function create()
    {
        $data['pageTitle'] = 'Add Product';
        $data['postTypeId'] = $this->postTypeId;
        $data['isProduct'] = true;
        return view('admin.products.create', $data);
    }

    public function store(StorePost $request)
    {
        //dd($request->all());
        $post = $this->post->create($this->postTypeId, $request->publish_date);
        $this->post->addTranslation($post, $request->only(['title','excerpt','content','page_title','meta_description']));

        $sections = [];
        // dd($request->sections);
        if (isset($request->sections) && count($request->sections) > 0) {
            foreach ($request->sections as $lang => $items) {
                // dd($items);
                foreach ($items as $key => $item) {
                    $type = $item['type'];
                    $title = $item['title'];
                    if ($type == 'plain') {
                        $content = isset($item['description']) ? $item['description'] : '';
                    } else {
                        // dd($item['keypairs']);
                        $content = isset($item['keypairs']) ? json_encode($item['keypairs']) : '';
                    }
                    if ($content != '') {
                        $sections[] = [
                            'lang' => $lang,
                            'title' => $title,
                            'type' => $type,
                            'content' => $content
                        ];
                    }
                }
            }

            $this->post->addProductSection($post, $sections);
        }


        $mediaId = $request->featured_image_id;
        $this->post->addMedia($post, $mediaId);

        return backendRedirect('product')->with(['message' => 'Data has been saved.']);
    }

    public function edit(PostModel $post)
    {
        $data['pageTitle'] = 'Edit Product';
        $data['post'] = $post->load('translations')
            ->load('metas')
            ->load('medias')
            ->load('productSections');
        $media = '';
        if ($post->medias->count()) {
            $media = $post->medias()->first()->toJson();
        }
        $data['isProduct'] = true;
        $sections = '';
        if ($data['post']->productSections->count()) {
            $sections = $data['post']->productSections->toJson();
        }
        $data['sections'] = $sections;
        $data['media'] = $media;
        // dd($data);
        return view('admin.products.edit', $data);
    }

    public function update(StorePost $request, PostModel $post)
    {
        $this->post->updateTranslation($post, $request->only(['title','excerpt','content','page_title','meta_description']));
        $sections = [];
        $post->productSections()->delete();
        if (isset($request->sections) && count($request->sections) > 0) {
            foreach ($request->sections as $lang => $items) {
                // dd($items);
                foreach ($items as $key => $item) {
                    $type = $item['type'];
                    $title = $item['title'];
                    if ($type == 'plain') {
                        $content = isset($item['description']) ? $item['description'] : '';
                    } else {
                        $content = isset($item['keypairs']) ? json_encode($item['keypairs']) : '';
                    }
                    if ($content != '') {
                        $sections[] = [
                            'lang' => $lang,
                            'title' => $title,
                            'type' => $type,
                            'content' => $content
                        ];
                    }
                }
            }
            $this->post->addProductSection($post, $sections);
        }

        $mediaId = $request->featured_image_id;
        $this->post->addMedia($post, $mediaId);

        return backendRedirect('product')->with(['message' => 'Data has been saved.']);
    }

    public function delete(PostModel $post)
    {
        $post->delete();
        return backendRedirect('product')->with(['message' => 'Data has been deleted.']);
    }

    // Frontend
    public function product() {
        $locale = App::getLocale();
        $products = PostModel::with(['translations' => function ($query) use ($locale) {
                    $query->where('locale', '=', $locale);
                }])->where('post_type_id', 4)->get();
        // $data['isContact'] = true;
        $data['products'] = $products;
        $data['icons'] = ['home', 'goods', 'goods-home'];
        return view('frontend/product', $data);
    }
}
