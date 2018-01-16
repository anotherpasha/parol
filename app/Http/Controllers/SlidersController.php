<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\Post as PostModel;
use App\Services\Post;
use App\Services\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    /**
     * @var Post
     */
    private $post;
    protected $slider;
    protected $postTypeId = 5;

    /**
     * PostsController constructor.
     */
    public function __construct(Post $post, Slider $slider)
    {
        $this->post = $post;
        $this->slider = $slider;
    }

    public function index()
    {
        $data['pageTitle'] = 'Slider';
        return view('admin.sliders.index', $data);
    }

    public function datatableList()
    {
        return $this->slider->datatable();
    }

    public function create()
    {
        $data['pageTitle'] = 'Add Slider';
        return view('admin.sliders.create', $data);
    }

    public function store(Request $request)
    {
        if ($this->slider->store($request)) {
            return backendRedirect('sliders');
        }
        return backendRedirect('sliders/create')->withInput();
    }

    public function edit(Request $request, $id)
    {
        $slider = $this->slider->getSliderById($id);
        $data['gallery'] = $slider;
        $data['id'] = $id;
        $data['pageTitle'] = 'Edit Slider';

        return view('admin.sliders.edit', $data);
    }

    public function update(Request $request, $id)
    {
        if ($this->slider->update($request, $id)) {
            return backendRedirect('sliders/' . $id . '/edit')->with('message', 'Slider Saved.');;
        }
        return backendRedirect('sliders/' . $id . '/edit')->withErrors(['update' => 'Error when updating the data.']);
    }

    public function delete($id)
    {
        if ($this->slider->destroy($id)) {
            return backendRedirect('sliders');
        }
        return backendRedirect('sliders')->withErrors(['delete_failed' => 'Error when delete the data.']);
    }
}

