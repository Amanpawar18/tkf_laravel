<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function contactUsPage()
    {
        return view('frontend.contact-us.view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function contactUsSave()
    {
        ContactUs::create(request()->all());

        return redirect()->route('frontend.contact-us.view')->with('status', 'We will try to reach you asap !!');
    }
}
