<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderPlaceMail;
use App\Models\Category;
use App\Models\HomePageData;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Mail, Auth;

class HomeController extends Controller
{
    public function home()
    {
        $homePageData = HomePageData::first();
        if (!$homePageData) {
            return abort('403', 'Run Seeders !!');
        }
        $products = Product::orderBy('product_view_count', 'DESC')->limit(4)->get();
        return view('frontend.home', compact('homePageData', 'products'));
    }

    public function category(Category $category)
    {
        $homePageData = HomePageData::first();
        if (!$homePageData) {
            return abort('403', 'Run Seeders !!');
        }
        $products = Product::where('category_id', $category->id)
            ->orderBy('product_view_count', 'DESC')->take(4)->get();
        return view('frontend.category', compact('category', 'homePageData', 'products'));
    }

    public function dashboard()
    {
        return view('frontend.user.dashboard');
    }

    public function newsLetter()
    {
        $this->validate(request(), [
            'email' => 'required'
        ]);

        Newsletter::create([
            'email' => request()->email
        ]);

        return redirect(request()->currentUrl)->with('success', 'Thanks for subscription!');
    }

    public function petraceuticalsSchedule()
    {
        $pathToFile = public_path() . '/frontend/PetraceuticalSchedule.pdf';
        return response()->file($pathToFile);
    }

    public function orderCreateMail()
    {
        $order = Order::first();
        Mail::to('amanpawar9718@gmail.com')->send(new OrderPlaceMail($order));
        return view('frontend.mail-templates.order-create', compact('order'));
    }

    public function thankYouPage()
    {
        return view('frontend.pages.thank-you');
    }
}
