<?php

namespace App\Helper;

use Route;
use Illuminate\Support\Str;

class Common
{

    public static function getCurrentController()
    {
        $action = Route::current()->action;
        $action1 = explode('\\', $action['controller']);
        $action2 = explode('@', end($action1));
        return $action2[0];
    }

    public static function uploadImage($image, $path)
    {
        $filename = time() . '_' . rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
        $image->move($path, $filename);
        return $filename;
    }


    public static function deleteExistingImage($image, $path)
    {
        $previousImage = $path . $image;
        // dd($previousImage);
        if ($image != '' && file_exists($previousImage) && $image != env('defaultImage')) {
            unlink($previousImage);
        }
    }

    public static function makeSlug($title, $modalName, $id = 0)
    {
        $slug =  Str::slug($title);
        $i = 1;
        $modal = 'App\Models\\' . $modalName;
        if ($id == 0) {
            while ($modal::whereSlug($slug)->exists()) {
                $slug = $slug . '-' . $i;
                while ($modal::whereSlug($slug)->exists()) {
                    $j = $i + 1;
                    $slug = str_replace('-' . $i, '-' . $j, $slug);
                    $i++;
                }
            }
        } else {
            while ($modal::where('id', '!=', $id)->whereSlug($slug)->exists()) {
                $slug = $slug . '-' . $i;
                while ($modal::where('id', '!=', $id)->whereSlug($slug)->exists()) {
                    $j = $i + 1;
                    $slug = str_replace('-' . $i, '-' . $j, $slug);
                    $i++;
                }
            }
        }
        return $slug;
    }

}
