<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

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
        return $pdf->download('invoice.pdf');

        return view('frontend.pages.invoice', compact('order'));
    }
}
