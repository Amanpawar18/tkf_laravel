<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Model\ProductBenefit;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductBenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $productBenefits = $product->productBenefits()->paginate(10);
        return view('backend.product-benefit.index', compact('product', 'productBenefits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $productBenefit = new ProductBenefit();
        return view('backend.product-benefit.create', compact('product', 'productBenefit'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $product->productBenefits()->create(request()->all());
        return redirect()->route('admin.product-benefit.index', $product->slug)->with('status', 'Benefit created successfully ');
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
    public function edit(Product $product, ProductBenefit $productBenefit)
    {
        return view('backend.product-benefit.edit', compact('product', 'productBenefit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, ProductBenefit $productBenefit)
    {
        $productBenefit->update(request()->all());
        return redirect()->route('admin.product-benefit.index', $product->slug)->with('status', 'Benefit updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductBenefit $productBenefit)
    {
        $productBenefit->delete();
        return redirect()->route('admin.product-benefit.index', $product->slug)->with('status', 'Benefit deleted successfully ');
    }
}
