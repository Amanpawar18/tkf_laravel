<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(10);
        return view('backend.frontend-pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page = new Page();
        return view('backend.frontend-pages.create', compact('page'));
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
            'slug' => 'unique:pages,slug'
        ]);
        $page = Page::create(request()->all());
        $this->uploadPageImages($page);
        return redirect()->route('admin.pages.index')->with('status', 'Page created successfully');
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
    public function edit(Page $page)
    {
        return view('backend.frontend-pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Page $page)
    {
        $this->validate(request(), [
            'slug' => 'unique:pages,slug,' . $page->id
        ]);
        $page->update(request()->all());
        // $page->content = request()->content;
        // $page->save();
        // dd(request()->all());
        $this->uploadPageImages($page);
        return redirect()->route('admin.pages.index')->with('status', 'Page created successfully');
    }

    public function uploadPageImages($page)
    {

        if (request()->hasFile('banner_image')) {
            $bannerImageName = time() . '.' . request()->banner_image->extension();
            $path = public_path('frontend/uploads/page');
            request()->banner_image->move($path, $bannerImageName);
            if (isset($page->banner_image)) {
                Common::deleteExistingImage($page->banner_image, $path);
            }
            $page->banner_image = $bannerImageName;
            $page->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('status', 'Page deleted successfully');
    }
}
