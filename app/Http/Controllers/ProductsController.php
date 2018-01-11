<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post as PostModel;
use App\Services\Post;
use Illuminate\Http\Request;

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
        // dd($request->all());
        $post = $this->post->create($this->postTypeId, $request->publish_date);
        $this->post->addTranslation($post, $request->only(['title','excerpt','content','page_title','meta_description']));

        $sections = [];
        // dd($request->sections);
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

        return backendRedirect('product')->with(['message' => 'Data has been saved.']);
    }

    public function edit(PostModel $post)
    {
        $data['pageTitle'] = 'Edit Product';
        $data['post'] = $post->load('translations')->load('metas')->load('productSections');
        $data['isProduct'] = true;
        $sections = '';
        if ($data['post']->productSections->count()) {
            $sections = $data['post']->productSections->toJson();
        }
        $data['sections'] = $sections;
        return view('admin.products.edit', $data);
    }

    public function update(StorePost $request, PostModel $post)
    {
        $this->post->update($request, $post);
        return backendRedirect('product')->with(['message' => 'Data has been updated.']);
    }

    public function delete(PostModel $post)
    {
        $post->delete();
        return backendRedirect('product')->with(['message' => 'Data has been deleted.']);
    }
}
