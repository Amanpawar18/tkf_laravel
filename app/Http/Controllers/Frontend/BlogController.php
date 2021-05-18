<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('frontend.blogs.index', compact('blogs'));
    }

    public function view(Blog $blog)
    {
        return view('frontend.blogs.view', compact('blog'));
    }
}
