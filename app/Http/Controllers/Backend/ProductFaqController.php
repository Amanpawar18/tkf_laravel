<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductFaq;
use Illuminate\Http\Request;

class ProductFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $productFaqs = $product->productFaqs()->paginate(10);
        return view('backend.product-faq.index', compact('product', 'productFaqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $productFaq = new ProductFaq();
        return view('backend.product-faq.create', compact('product', 'productFaq'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $product->productFaqs()->create(request()->all());
        return redirect()->route('admin.product-faq.index', $product->slug)->with('status', 'Faq created successfully ');
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
    public function edit(Product $product, ProductFaq $productFaq)
    {
        return view('backend.product-faq.edit', compact('product', 'productFaq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, ProductFaq $productFaq)
    {
        $productFaq->update(request()->all());
        return redirect()->route('admin.product-faq.index', $product->slug)->with('status', 'Faq updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductFaq $productFaq)
    {
        $productFaq->delete();
        return redirect()->route('admin.product-faq.index', $product->slug)->with('status', 'Faq deleted successfully ');
    }
}
