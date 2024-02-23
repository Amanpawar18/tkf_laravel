<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Setting;

class SettingsController extends Controller
{
    public function view()
    {
        $fields = Setting::all();
        return view('backend.setting.view', compact('fields'));
    }

    public function update()
    {
        $fields = request()->except('_token', 'footer_logo', 'website_logo');
        // dd($fields);
        foreach ($fields as $key => $field) {
            Setting::set($key, $field);
        }
        if (request()->hasFile('footer_logo')) {
            $path = public_path() . env('HOME_IMAGE_PATH');

            if (Setting::get('footer_logo')) {
                $imageName = Common::deleteExistingImage(Setting::get('footer_logo'), $path);
            }
            $imageName = Common::uploadImage(request()->footer_logo, $path);
            Setting::set('footer_logo', $imageName);
        }

        if (request()->hasFile('website_logo')) {
            $path = public_path() . env('HOME_IMAGE_PATH');

            if (Setting::get('website_logo')) {
                $imageName = Common::deleteExistingImage(Setting::get('website_logo'), $path);
            }
            $imageName = Common::uploadImage(request()->website_logo, $path);
            Setting::set('website_logo', $imageName);
        }

        Setting::save();
        return back()->with('status', 'Data Updated Successfully');
    }
}
