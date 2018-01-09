<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post as PostModel;
use App\Services\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * @var Post
     */
    private $post;
    protected $postTypeId = 1;

    /**
     * PostsController constructor.
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function datatableList()
    {
        return $this->post->datatable();
    }

    public function create()
    {
        $data['postTypeId'] = $this->postTypeId;
        return view('admin.posts.create', $data);
    }

    public function store(StorePost $request)
    {
        $this->post->store($request);
        return redirect('posts')->with(['message' => 'Data has been saved.']);
    }

    public function edit(PostModel $post)
    {
        $data['post'] = $post->load('translations');
        return view('admin.posts.edit', $data);
    }

    public function update(StorePost $request, PostModel $post)
    {
        $this->post->update($request, $post);
        return redirect('posts')->with(['message' => 'Data has been updated.']);
    }

    public function delete(PostModel $post)
    {
        $post->delete();
        return redirect('posts')->with(['message' => 'Data has been deleted.']);
    }
}
