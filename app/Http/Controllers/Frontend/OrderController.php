<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\Common;
use App\Http\Controllers\Controller;
use App\Models\ClientExperience;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF, Auth;

class OrderController extends Controller
{

    public function invoice(Order $order)
    {

        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('frontend.pages.invoice', compact('order'));

        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );
        // download PDF file with download method
        // return $pdf->download('invoice.pdf');

        return view('frontend.pages.invoice', compact('order'));
    }

    public function saveExperience()
    {
        $data = request()->except('image');
        $data['user_id'] = Auth::id();
        $data['category_id'] = Product::whereId(request()->product_id)->first()->category_id;
        $experience = ClientExperience::create($data);
        $this->uploadImage($experience);
        return back()->with('status', 'Experience saved successfully !!');
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
