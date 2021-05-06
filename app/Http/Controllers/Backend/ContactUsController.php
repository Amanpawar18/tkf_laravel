<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = ContactUs::orderBy('id', 'DESC')->paginate(15);

        return view('backend.contact-us.index', compact('leads'));
    }

    public function view(ContactUs $contactUs)
    {
        return view('backend.contact-us.show', compact('contactUs'));
    }

    public function destroy(ContactUs $contactUs)
    {
        $contactUs->delete();
        return redirect()->route('admin.contactUs.index')->with('status', 'Lead deleted successfully !!');
    }
}
