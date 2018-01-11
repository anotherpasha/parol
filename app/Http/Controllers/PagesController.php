<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post as PostModel;
use App\Services\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @var Post
     */
    private $page;
    protected $postTypeId = 2;

    /**
     * PostsController constructor.
     */
    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function index()
    {
        $data['pageTitle'] = 'Pages';
        return view('admin.pages.index', $data);
    }

    public function datatableList()
    {
        return $this->page->datatable($this->postTypeId, 'pages');
    }

    public function create()
    {
        $data['pageTitle'] = 'Add Page';
        $data['postTypeId'] = $this->postTypeId;
        return view('admin.pages.create', $data);
    }

    public function store(StorePost $request)
    {
        $this->page->store($request);
        return backendRedirect('pages')->with(['message' => 'Data has been saved.']);
    }

    public function edit(PostModel $post)
    {
        $data['pageTitle'] = 'Edit Page';
        $data['post'] = $post->load('translations');
        return view('admin.pages.edit', $data);
    }

    public function update(StorePost $request, PostModel $post)
    {
        $this->page->update($request, $post);
        return backendRedirect('pages')->with(['message' => 'Data has been updated.']);
    }

    public function delete(PostModel $post)
    {
        $post->delete();
        return backendRedirect('pages')->with(['message' => 'Data has been deleted.']);
    }
}
