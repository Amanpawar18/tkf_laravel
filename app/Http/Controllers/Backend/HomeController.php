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
        $homePageData->update(request()->except('section_three_image', 'section_five_image', 'section_six_image_one', 'section_six_image_two'));
        $this->uploadProductImages($homePageData);
        return redirect()->route('admin.home-page.edit')->with('status', 'Home Page updated successfully !!');
    }

    public function uploadProductImages($homePageData)
    {
        $path = public_path() . env('HOME_IMAGE_PATH');
        if (request()->section_three_image) {

            if ($homePageData->section_three_image) {
                $imageName = Common::deleteExistingImage($homePageData->section_three_image, $path);
            }
            $imageName = Common::uploadImage(request()->section_three_image, $path);
            $homePageData->section_three_image = $imageName;
        }
        if (request()->section_five_image) {

            if ($homePageData->section_five_image) {
                $imageName = Common::deleteExistingImage($homePageData->section_five_image, $path);
            }
            $imageName = Common::uploadImage(request()->section_five_image, $path);
            $homePageData->section_five_image = $imageName;
        }
        if (request()->section_six_image_one) {

            if ($homePageData->section_six_image_one) {
                $imageName = Common::deleteExistingImage($homePageData->section_six_image_one, $path);
            }
            $imageName = Common::uploadImage(request()->section_six_image_one, $path);
            $homePageData->section_six_image_one = $imageName;
        }
        if (request()->section_six_image_two) {

            if ($homePageData->section_six_image_two) {
                $imageName = Common::deleteExistingImage($homePageData->section_six_image_two, $path);
            }
            $imageName = Common::uploadImage(request()->section_six_image_two, $path);
            $homePageData->section_six_image_two = $imageName;
        }
        $homePageData->save();
        return true;
    }
}
