<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TdsTransaction;
use Illuminate\Http\Request;
use Setting;

class TdsController extends Controller
{
    public function index()
    {
        return view('backend.setting.tds');
    }

    public function update()
    {
        $fields = request()->only('tds_percent', 'tds_period');
        foreach ($fields as $key => $field) {
            Setting::set($key, $field);
        }
        Setting::save();
        return back()->with('status', 'Data Updated Successfully');
    }
}
