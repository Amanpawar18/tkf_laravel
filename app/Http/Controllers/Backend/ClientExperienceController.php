<?php

namespace App\Http\Controllers\Backend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\ClientExperience;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientExperienceController extends Controller
{
    public function index()
    {
        $experiences = ClientExperience::orderBy('id', 'DESC')->paginate(15);
        return view('backend.client-experience.index', compact('experiences'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();
        $clientExperience =  new ClientExperience();
        return view('backend.client-experience.create', compact('products', 'clientExperience'));
    }

    public function show(ClientExperience $clientExperience)
    {
        return view('backend.client-experience.show', compact('clientExperience'));
    }

    public function edit(ClientExperience $clientExperience)
    {
        $products = Product::orderBy('name')->get();
        return view('backend.client-experience.edit', compact('clientExperience', 'products'));
    }

    public function update(ClientExperience $clientExperience)
    {
        $clientExperience->update(request()->except('image'));
        $this->uploadImage($clientExperience);
        return redirect()->route('admin.client-experience.index')->with('status', 'Client Experience updated successfully !!');
    }

    public function destroy(ClientExperience $clientExperience)
    {
        $clientExperience->delete();
        return redirect()->route('admin.client-experience.index')->with('status', 'Client Experience deleted successfully !!');
    }

    public function status(ClientExperience $clientExperience)
    {
        if ($clientExperience->status == 0) {
            $clientExperience->status = ClientExperience::ACTIVE;
            $message = 'Status changed to active';
        } else {
            $clientExperience->status = ClientExperience::INACTIVE;
            $message = 'Status changed to inactive';
        }
        $clientExperience->save();
        return [
            'message' => $message,
            'status' => $clientExperience->status,
            'type' => 'success'
        ];
    }

    public function store ()
    {
        $data = request()->except('image');
        $data['user_id'] = Auth::id();
        $data['category_id'] = Product::whereId(request()->product_id)->first()->category_id;
        $experience = ClientExperience::create($data);
        $this->uploadImage($experience);
        return redirect()->route('admin.client-experience.index')->with('status', 'Experience saved successfully !!');
    }


    public function uploadImage($experience)
    {
        if (request()->hasFile('image')) {
            $imageName = time() . '.' . request()->image->extension();
            $path = public_path('frontend/uploads/experience/');
            request()->image->move($path, $imageName);
            if (isset($experience->image)) {
                Common::deleteExistingImage($experience->image, $path);
            }
            $experience->image = $imageName;
            $experience->save();
        }
    }
}
