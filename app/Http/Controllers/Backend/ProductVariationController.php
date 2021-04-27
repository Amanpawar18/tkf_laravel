<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationImage;
use Illuminate\Http\Request;

class ProductVariationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $productVariations = $product->productVariations()->paginate(10);
        return view('backend.product-variation.index', compact('product', 'productVariations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $productVariation = new ProductVariation();
        return view('backend.product-variation.create', compact('product', 'productVariation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $productVariation = $product->productVariations()->create(request()->all());
        $this->uploadProductImages($product, $productVariation);
        return redirect()->route('admin.product-variation.index', $product->slug)->with('status', 'Variation created successfully ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, ProductVariation $productVariation)
    {
        return view('backend.product-variation.edit', compact('product', 'productVariation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, ProductVariation $productVariation)
    {
        $productVariation->update(request()->all());
        $this->uploadProductImages($product, $productVariation);
        return redirect()->route('admin.product-variation.index', $product->slug)->with('status', 'Variation updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductVariation $productVariation)
    {
        // dd($productVariation);
        $productVariation->delete();
        return redirect()->route('admin.product-variation.index', $product->slug)->with('status', 'Variation deleted successfully ');
    }

    public function uploadProductImages($product, $productVariation)
    {
        if (request()->images && count(request()->images)) {

            $path = public_path() . env('PRODUCT_IMAGE_PATH');

            foreach ($productVariation->images as $image) {
                $imageName = Common::deleteExistingImage($image->image, $path);
                $image->delete();
            }
            foreach (request()->images as $image) {

                $imageName = Common::uploadImage($image, $path);
                $productVariation->images()->create(['product_id' => $product->id, 'image' => $imageName]);
            }
        }
    }

    public function destroyImage()
    {
        $image = ProductVariationImage::find(request()->key);
        $path = public_path() . env('PRODUCT_IMAGE_PATH');
        Common::deleteExistingImage($image, $path);
        $image->delete();
        return true;
    }
}
