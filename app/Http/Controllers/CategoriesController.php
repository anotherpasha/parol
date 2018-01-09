<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Models\Category as CategoryModel;
use App\Models\PostType;
use App\Services\Category;

class CategoriesController extends Controller
{
    /**
     * @var Category
     */
    private $category;

    /**
     * CategoryController constructor.
     */
    public function __construct(Category $category)
    {
        $this->middleware('authorization');
        $this->category = $category;
    }

    public function index(PostType $postType)
    {
        return view('admin.categories.index', compact('postType'));
    }

    public function datatableList(PostType $postType)
    {
        return $this->category->datatable($postType);
    }

    public function create(PostType $postType)
    {
        return view('admin.categories.create', compact('postType'));
    }

    public function store(PostType $postType, StoreCategory $request)
    {
        $this->category->store($request, $postType);
        return redirect('categories/' . $postType->id)->with(['message' => 'Data has been saved.']);
    }

    public function edit(PostType $postType, CategoryModel $category)
    {
        return view('admin.categories.edit', compact(['category', 'postType']));
    }

    public function update(StoreCategory $request, $postTypeId, CategoryModel $category)
    {
        $this->category->update($request, $category);
        return redirect('categories/' . $postTypeId)->with(['message' => 'Data has been updated.']);
    }

    public function delete($postTypeId, CategoryModel $category)
    {
        $category->delete();
        return redirect('categories/' . $postTypeId)->with(['message' => 'Data has been deleted.']);
    }
}
