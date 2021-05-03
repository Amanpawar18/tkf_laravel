<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function shippingReturns()
    {
        return view('frontend.pages.shipping');
    }

    public function aboutUs()
    {
        return view('frontend.pages.about');
    }

    public function view(Page $page)
    {
        return view('frontend.pages.view', compact('page'));
    }
}
