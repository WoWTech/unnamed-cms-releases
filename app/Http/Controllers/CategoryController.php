<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Category, Topic};

class CategoryController extends Controller
{

    public function index()
    {
        if ($this->isAdminRequest())
            return $this->adminIndex();

        $categories = Category::whereNull('parent_id')->with('forums')->get();

        return view('forum.categories.index', compact('categories'));
    }

    public function adminindex()
    {
        $categories = Category::whereNull('parent_id');

        if (request('keywords'))
            $categories->where('name', 'LIKE', '%'.request('keywords').'%');

        $categories = $categories->paginate(10);

        return view('admin.categories.index', compact('categories'));
    }

    public function subcategoriesIndex(Category $category)
    {
        $subcategories = Category::whereParentId($category->id);

        if (request('keywords'))
            $subcategories->where('name', 'LIKE', '%'.request('keywords').'%');

        $subcategories = $subcategories->paginate(10);

        return view('admin.subcategories.index', compact('subcategories', 'category'));
    }

    public function subcategoriesEdit(Category $category, Category $subcategory)
    {
        if (!Laratrust::can('update-forum-category'))
            return abort(403);

        return view('admin.subcategories.edit', compact('subcategory', 'category'));
    }

    public function subcategoriesUpdate(Category $category, Category $subcategory)
    {
        if (!Laratrust::can('update-forum-category'))
            return abort(403);

        $this->validateSubcategory();

        $subcategory->update(request(['name', 'category_description', 'category_slug']));

        return redirect()->route('admin.subcategories.index', $category);
    }

    public function subcategoriesCreate(Category $category)
    {
        if (!Laratrust::can('create-forum-category'))
            return abort(403);

        return view('admin.subcategories.create', compact('category'));
    }

    public function subcategoriesStore($category, Category $subcategory)
    {
        if (!Laratrust::can('create-forum-category'))
            return abort(403);

        $this->validateSubcategory();

        Category::create(request(['name', 'category_description', 'parent_id', 'category_slug']));

        return redirect()->route('admin.subcategories.index', $category);
    }

    public function subcategoriesDestroy($category, Category $subcategory)
    {
        if (!Laratrust::can('delete-forum-category'))
            return abort(403);

        $subcategory->delete();

        return redirect()->route('admin.subcategories.index', $category);
    }

    public function create()
    {
        if (!Laratrust::can('create-forum-category'))
            return abort(403);

        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        if (!Laratrust::can('create-forum-category'))
            return abort(403);

        $this->validateSubcategory();

        Category::create(request(['name', 'category_description']));

        return redirect()->route('admin.categories.index');
    }

    public function show($slug)
    {
        $category = Category::where('category_slug', $slug)->whereNotNull('parent_id')->firstOrFail();
        $topics = Topic::whereCategoryId($category->id)->with(['account' => function($query) {
          $query->select('id', 'username');
        }])->simplePaginate(15);

        return view('forum.categories.show', compact('category', 'topics'));
    }

    public function edit(Category $category)
    {
        if (!Laratrust::can('update-forum-category'))
            return abort(403);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if (!Laratrust::can('update-forum-category'))
            return abort(403);

        $this->validateCategory();

        $category->update(request(['name', 'category_description']));

        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        if (!Laratrust::can('delete-forum-category'))
            return abort(403);

        $category->delete();

        return redirect()->route('admin.categories.index');
    }

    private function validateCategory()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:25',
            'category_description' => 'nullable|max:145'
        ]);
    }

    private function validateSubcategory()
    {
        $this->validate(request(), [
            'name' => 'required|min:3|max:25',
            'category_description' => 'nullable|max:145',
            'parent_id' => 'integer',
            'category_slug' => 'required|alpha_dash'
        ]);
    }
}
