<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderPlaceMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\ClientExperience;
use App\Models\HomePageData;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Mail, Auth, PDF;

class HomeController extends Controller
{
    public function home()
    {
        $homePageData = HomePageData::first();
        if (!$homePageData) {
            return abort('403', 'Run Seeders !!');
        }
        $products = Product::orderBy('product_view_count', 'DESC')->limit(4)->get();
        $blogs = Blog::orderBy('id', 'DESC')->get()->shuffle()->take(3);
        $clientExperiences = ClientExperience::get()->shuffle()->take(3);
        // return view('frontend.home-new', compact('homePageData', 'products', 'blogs', 'clientExperiences'));
        return view('frontend.home', compact('homePageData', 'products', 'blogs', 'clientExperiences'));
    }

    public function category(Category $category)
    {
        $homePageData = HomePageData::first();
        if (!$homePageData) {
            return abort('403', 'Run Seeders !!');
        }
        $products = Product::where('category_id', $category->id)
            ->orderBy('product_view_count', 'DESC')->take(4)->get();
        $clientExperiences = ClientExperience::whereCategoryId($category->id)->get()->shuffle()->take(3);
        return view('frontend.category', compact('category', 'homePageData', 'products', 'clientExperiences'));
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
        $order = Order::orderBy('id', 'DESC')->first();
        // Mail::to('amanpawar9718@gmail.com')->send(new OrderPlaceMail($order));
        return view('frontend.mail-templates.order-create', compact('order'));
    }

    public function thankYouPage()
    {
        return view('frontend.pages.thank-you');
    }
}
