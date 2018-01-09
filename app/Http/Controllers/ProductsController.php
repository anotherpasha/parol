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
        return $this->post->datatable($this->postTypeId, 'faq');
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
        $this->post->store($request);
        return backendRedirect('faq')->with(['message' => 'Data has been saved.']);
    }

    public function edit(PostModel $post)
    {
        $data['pageTitle'] = 'Edit Product';
        $data['post'] = $post->load('translations');
        return view('admin.products.edit', $data);
    }

    public function update(StorePost $request, PostModel $post)
    {
        $this->post->update($request, $post);
        return backendRedirect('faq')->with(['message' => 'Data has been updated.']);
    }

    public function delete(PostModel $post)
    {
        $post->delete();
        return backendRedirect('faq')->with(['message' => 'Data has been deleted.']);
    }
}
