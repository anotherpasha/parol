<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post as PostModel;
use App\Services\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class FaqController extends Controller
{
    /**
     * @var Post
     */
    private $post;
    protected $postTypeId = 3;

    /**
     * PostsController constructor.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $data['pageTitle'] = 'FAQ';
        return view('admin.faqs.index', $data);
    }

    public function datatableList()
    {
        return $this->post->datatable($this->postTypeId, 'faq');
    }

    public function create()
    {
        $data['pageTitle'] = 'Add FAQ';
        $data['postTypeId'] = $this->postTypeId;
        return view('admin.faqs.create', $data);
    }

    public function store(StorePost $request)
    {
        $this->post->store($request);
        return backendRedirect('faq')->with(['message' => 'Data has been saved.']);
    }

    public function edit(PostModel $post)
    {
        $data['pageTitle'] = 'Edit FAQ';
        $data['post'] = $post->load('translations');
        return view('admin.faqs.edit', $data);
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

    // frontend
    public function faq() {
        $locale = App::getLocale();
        $faqs = PostModel::with(['translations' => function ($query) use ($locale) {
                    $query->where('locale', '=', $locale);
                }])->where('post_type_id', 3)->orderBy('order')->get();
        $data['faqs'] = $faqs;
        return view('frontend/faq', $data);
    }
}
