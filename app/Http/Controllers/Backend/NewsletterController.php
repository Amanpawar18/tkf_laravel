<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletterEmails = Newsletter::simplePaginate(15);
        return view('backend.newsletter.index', compact('newsletterEmails'));
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->route('admin.newsletter.index')->with('status', 'Email deleted successfully !');
    }
}
