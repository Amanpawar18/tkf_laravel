<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\FooterData;
use Illuminate\Http\Request;

class FooterDataController extends Controller
{
    public function edit()
    {
        $footerData = FooterData::first();
        return view('backend.pages.footer-data', compact('footerData'));
    }

    public function update()
    {
        $footerData = FooterData::first();
        // dd(request()->except('image_one', 'image_two', 'image_three', 'image_four', 'image_five'));
        $footerData->update(request()->except('image_one', 'image_two', 'image_three', 'image_four', 'image_five'));
        $this->uploadProductImages($footerData);
        return redirect()->route('admin.footer-data.edit')->with('status', 'Footer updated successfully !!');
    }

    public function uploadProductImages($footerData)
    {
        $path = public_path() . env('HOME_IMAGE_PATH');
        if (request()->image_one) {

            if ($footerData->image_one) {
                $imageName = Common::deleteExistingImage($footerData->image_one, $path);
            }
            $imageName = Common::uploadImage(request()->image_one, $path);
            $footerData->image_one = $imageName;
        }
        if (request()->image_two) {

            if ($footerData->image_two) {
                $imageName = Common::deleteExistingImage($footerData->image_two, $path);
            }
            $imageName = Common::uploadImage(request()->image_two, $path);
            $footerData->image_two = $imageName;
        }
        if (request()->image_three) {

            if ($footerData->image_three) {
                $imageName = Common::deleteExistingImage($footerData->image_three, $path);
            }
            $imageName = Common::uploadImage(request()->image_three, $path);
            $footerData->image_three = $imageName;
        }
        if (request()->image_four) {

            if ($footerData->image_four) {
                $imageName = Common::deleteExistingImage($footerData->image_four, $path);
            }
            $imageName = Common::uploadImage(request()->image_four, $path);
            $footerData->image_four = $imageName;
        }
        if (request()->image_five) {

            if ($footerData->image_five) {
                $imageName = Common::deleteExistingImage($footerData->image_five, $path);
            }
            $imageName = Common::uploadImage(request()->image_five, $path);
            $footerData->image_five = $imageName;
        }
        $footerData->save();
        return true;
    }
}
