<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ClientExperience;
use App\Models\Product;
use App\Models\ShoesChart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // $subcategories = [];

        // $query = Product::with('category');
        // // $categories = Category::parentCategories();
        // $categories = Category::whereNull('category_id')->where(function ($query) {
        //     $query->has('products')->orHas('categories.products');
        // })->get();

        // if (request()->category) {

        //     $category = Category::whereSlug(request()->category)->first();
        //     $query->where('category_id', $category->id)
        //         ->orWhere('subcategory_id', $category->id);

        //     $subcategories = Category::where('category_id', $category->id)
        //     ->where(function($productQuery){
        //         $productQuery->has('products')->orHas('subCategoryProducts');
        //     })->get();
        // }

        // $query->where('status', 1);
        // $products = $query->simplePaginate(12);

        // return view('frontend.product.index', compact('products', 'categories', 'subcategories', 'category'));
        return view('frontend.product.index');
    }

    public function shop()
    {
        if (isset(request()->category)) {
            $category = Category::where('slug', 'LIKE', '%' . request()->category . '%')->first();
        }
        if (isset(request()->subcategory)) {
            $subCategory = Category::where('slug', 'LIKE', '%' . request()->subcategory . '%')->first();
        }

        // dd($category->id, $subCategory->id);
        $query = Product::with('productFaqs', 'productBenefits', 'productVariations');
        if (isset($subCategory)) {
            $query->where('subcategory_id', $subCategory->id);
        } elseif (isset($category)) {
            $query->where('category_id', $category->id);
        }

        $products = $query->get();

        $categories = Category::with('categories')
            ->whereHas('products')
            ->get();
        return view('frontend.product.shop', compact('products', 'categories'));
    }

    public function details(Product $product)
    {
        $relatedProducts = Product::whereSubcategoryId($product->subcategory_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
        $product->product_view_count =  $product->product_view_count + 1;
        $product->save();
        $clientExperiences = ClientExperience::whereProductId($product->id)->get()->shuffle()->take(3);
        return view('frontend.product.details', compact('product', 'relatedProducts', 'clientExperiences'));
    }
}
