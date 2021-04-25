<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // $categories = Category::whereHas('childrenCategories')->get();
        $categories = Category::whereNull('category_id')->get();
        $product = new Product();
        return view('backend.product.create', compact('categories', 'product'));
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

        $product = Product::create(request()->all());
        $this->uploadProductImages($product);
        return redirect()->route('admin.product.index')->with('status', ' Product Created successfully !!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Product $product)
    {

        return view('backend.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = Category::whereHas('childrenCategories')->get();
        return view('backend.product.edit', compact('product', 'categories'));
    }

    public function uploadProductImages($product)
    {
        // if (request()->productImages && count(request()->productImages)) {

        //     $path = public_path() . env('PRODUCT_IMAGE_PATH');

        //     foreach ($product->productImages as $image) {
        //         $imageName = Common::deleteExistingImage($image->image, $path);
        //         $image->delete();
        //     }
        //     foreach (request()->productImages as $image) {

        //         $imageName = Common::uploadImage($image, $path);
        //         $product->productImages()->create(['image' => $imageName]);
        //     }
        // }
        if (request()->hasFile('image')) {
            $imageName = time() . '.' . request()->image->extension();
            request()->image->move(public_path('frontend/uploads/product'), $imageName);
            $product->image = $imageName;
            $product->save();
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */

    public function update(Request $request, Product $product)
    {
        request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $product->update(request()->all());
        // dd(request()->all());
        $this->uploadProductImages($product);
        return redirect()->route('admin.product.index')->with('status', ' Product updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('status', ' Product deleted successfully !!');
    }

    public function status(Product $product)
    {
        if ($product->status == 0) {
            $product->status = Product::ACTIVE;
            $message = 'Status changed to active';
        } else {
            $product->status = Product::INACTIVE;
            $message = 'Status changed to inactive';
        }
        $product->save();
        return [
            'message' => $message,
            'status' => $product->status,
            'type' => 'success'
        ];
    }

    public function getSubCategory()
    {
        $subcategories = Category::whereCategoryId(request()->category_id)->get();
        return $subcategories;
    }


    public function deleteProductImage()
    {
        $image = ProductImage::find(request()->key);
        $path = public_path() . env('PRODUCT_IMAGE_PATH');
        Common::deleteExistingImage($image, $path);
        $image->delete();
        return true;
    }
}
