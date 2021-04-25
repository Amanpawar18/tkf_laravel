<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::paginate(10);
        // return view('backend.category.index', compact('categories'));

        $categories = Category::whereNull('category_id')
            ->with('childrenCategories')
            ->paginate(10);
        return view('backend.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $category = new Category();
        return view('backend.category.create', compact('categories', 'category'));
    }

    public function addSubCategory(Category $category)
    {
        $category = Category::with('categories')->where('slug', $category->slug)->first();
        return view('backend.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = request()->only('name', 'category_id', 'frontend_video_url');
        $category = Category::create($data);
        $this->uploadCategoryImage($category);
        return redirect(request()->referer)->with('status', ' Category Created successfully !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Category $category)
    {
        $categories = Category::where('slug', $category->slug)->whereNull('category_id')
            ->with('childrenCategories')
            ->get();
        return view('backend.category.show', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        return view('backend.category.edit', compact('category', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Category $category)
    {
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'frontend_image_one' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'frontend_image_two' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = request()->only('name', 'category_id', 'frontend_video_url');
        $category->update($data);

        $this->uploadCategoryImage($category);
        return redirect()->route('admin.category.index')->with('status', ' Category updated successfully !!');
    }

    public function uploadCategoryImage($category)
    {
        $path = public_path() . env('CATEGORY_IMAGE_PATH');
        if (request()->hasFile('frontend_image_one')) {
            if(isset($category->frontend_image_one)){
                Common::deleteExistingImage($category->frontend_image_one, $path);
            }
            $imageName = Common::uploadImage(request()->frontend_image_one, $path);
            $category->frontend_image_one = $imageName;
        }
        if (request()->hasFile('frontend_image_two')) {
            if(isset($category->frontend_image_two)){
                Common::deleteExistingImage($category->frontend_image_two, $path);
            }
            $imageName = Common::uploadImage(request()->frontend_image_two, $path);
            $category->frontend_image_two = $imageName;
        }
        $category->save();
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.category.index')->with('status', ' Category deleted successfully !!');
    }


    public function subCategoryIndex(Category $category)
    {
        $category = Category::with('categories')->where('slug', $category->slug)->first();
        return view('backend.category.child_category_index', compact('category'));
    }
}
