<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\HomePageData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function edit()
    {
        $homePageData = HomePageData::first();
        return view('backend.pages.home-page', compact('homePageData'));
    }

    public function update()
    {
        // dd(request()->except('section_one_image', 'section_two_image', 'section_three_image', 'section_four_image'));
        $homePageData = HomePageData::first();
        $homePageData->update(request()->except('section_one_c1_image', 'section_one_c2_image'));
        $this->uploadProductImages($homePageData);
        return redirect()->route('admin.home-page.edit')->with('status', 'Home Page updated successfully !!');
    }

    public function uploadProductImages($homePageData)
    {
        $path = public_path() . env('HOME_IMAGE_PATH');
        if (request()->section_one_c1_image) {

            if ($homePageData->section_one_c1_image) {
                $imageName = Common::deleteExistingImage($homePageData->section_one_c1_image, $path);
            }
            $imageName = Common::uploadImage(request()->section_one_c1_image, $path);
            $homePageData->section_one_c1_image = $imageName;
        }
        if (request()->section_one_c2_image) {

            if ($homePageData->section_one_c2_image) {
                $imageName = Common::deleteExistingImage($homePageData->section_one_c2_image, $path);
            }
            $imageName = Common::uploadImage(request()->section_one_c2_image, $path);
            $homePageData->section_one_c2_image = $imageName;
        }
        $homePageData->save();
        return true;
    }
}
