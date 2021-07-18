<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::paginate(10);
        return view('backend.image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image = new Image();
        return view('backend.image.create', compact('image'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $image = Image::create([
            'image_name' => request()->image_name
        ]);
        $this->uploadImage($image);
        return redirect()->route('admin.image.index')->with('status', 'Image stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        return view('backend.image.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('backend.image.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Image $image)
    {
        $image->update([
            'image_name' => request()->image_name
        ]);
        $this->uploadImage($image);
        return redirect()->route('admin.image.index')->with('status', 'Image updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function uploadImage($image)
    {

        if (request()->hasFile('image')) {
            $imageName = $image->slug . '.' . request()->image->extension();
            $path = public_path('frontend/uploads/images/');
            request()->image->move($path, $imageName);
            if (isset($image->image)) {
                Common::deleteExistingImage($image->image, $path);
            }
            $image->image = $imageName;
            $image->save();
        }
    }


    public function destroy(Image $image)
    {
        $path = public_path('frontend/uploads/images/');
        Common::deleteExistingImage($image->image, $path);
        $image->delete();
        return redirect()->route('admin.image.index')->with('status', 'Image deleted successfully');
    }
}
