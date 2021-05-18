<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('backend.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blog = new Blog();
        return view('backend.blog.create', compact('blog'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'slug' => 'unique:blogs,slug'
        ]);
        $blog = Blog::create(request()->all());
        $this->uploadBlogImages($blog);
        return redirect()->route('admin.blog.index')->with('status', 'Blog created successfully');
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
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Blog $blog)
    {
        $this->validate(request(), [
            'slug' => 'unique:blogs,slug,' . $blog->id
        ]);
        $blog->update(request()->all());
        // $blog->content = request()->content;
        // $blog->save();
        // dd(request()->all());
        $this->uploadBlogImages($blog);
        return redirect()->route('admin.blog.index')->with('status', 'Blog created successfully');
    }

    public function uploadBlogImages($blog)
    {

        if (request()->hasFile('banner_image')) {
            $bannerImageName = time() . '.' . request()->banner_image->extension();
            $path = public_path('frontend/uploads/blog');
            request()->banner_image->move($path, $bannerImageName);
            if (isset($blog->banner_image)) {
                Common::deleteExistingImage($blog->banner_image, $path);
            }
            $blog->banner_image = $bannerImageName;
            $blog->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blog.index')->with('status', 'Blog deleted successfully');
    }
}
