<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Stream\Stream;
use GuzzleHttp\TransferStats;
use Illuminate\Support\Facades\Log;

class DelhiveryController extends Controller
{

    protected $token;
    protected $baseUrl;
    protected $client;

    public function __construct()
    {
        // $this->token = env('DELHIVERY_API_TOKEN', 'e8eae4f58c53c6f8ba1215923fa2ccde7639b6d3'); //test credentials
        $this->token = env('DELHIVERY_API_TOKEN', '4de023ad94205a48513882158ca11d267145af6d');
        // $this->baseUrl = 'https://staging-express.delhivery.com';
        $this->baseUrl = 'https://track.delhivery.com';
        $this->client = new Client([
            'base_uri' => $this->baseUrl
        ]);
    }

    public function checkPinCode($pinCode = null)
    {
        $url = '/c/api/pin-codes/json/';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'filter_codes' => $pinCode ?? request()->pin_code,
            ],
            'headers' => [
                'User-Agent' => 'ReadMe-API-Explorer',
                'Accept' => 'application/json',
                'Authorization' => 'Token ' . $this->token
            ],
        ])->getBody()->getContents();

        $response = json_decode($response);
        if (isset($response->delivery_codes)) {
            if (request()->pin_code && count($response->delivery_codes) == 1)
                return true;
            else
                return false;
        } else {
            return false;
        }
    }

    public function trackOrder()
    {
        $url = 'api/v1/packages/json/';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'waybill' => 'request()->waybill',
            ],
            'headers' => [
                'User-Agent' => 'ReadMe-API-Explorer',
                'Accept' => 'application/json',
                'Authorization' => 'Token ' . $this->token
            ],
        ])->getBody()->getContents();
        $response = json_decode($response);
        if (isset($response->ShipmentData)) {
            $shipmentData = $response->ShipmentData[0]; // getting the first element of array
            $status = $shipmentData->Shipment->Status;
            if ($status)
                return json_encode($status);
            else
                return false;
        } else {
            return isset($response->Error) ? $response->Error : 'Error while fetching contact support';
        }
    }

    public function generateWaybill()
    {
        $url = 'api/p/packing_slip';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'wbns' => request()->waybill,
            ],
            'headers' => [
                'User-Agent' => 'ReadMe-API-Explorer',
                'Accept' => 'application/json',
                'Authorization' => 'Token ' . $this->token
            ],
        ])->getBody()->getContents();
        $response = json_decode($response);
        if (isset($response->packages[0])) {
            dd($response->packages[0]);
        } else {
            return isset($response->packages_found) && $response->packages_found == 0 ? 'WayBill not found' : 'Error while fetching contact support';
        }
    }

    public function createOrder($order)
    {
        $url = '/api/cmu/create.json';
        $response = $this->client->request('POST', $url, [
            'form_params' => [
                'format' => 'json',
                'data' => $this->createOrderFormParams($order),
            ],
            'headers' => [
                'User-Agent' => 'ReadMe-API-Explorer',
                'Accept' => 'application/json',
                'Authorization' => 'Token ' . $this->token
            ],
        ])->getBody()->getContents();

        $response = json_decode($response);
        $packages = $response->packages;
        foreach ($packages as $key => $package) {
            if ($key == 0) { // run only for key one then stop
                if ($package->remarks[0] ==  "") {

                    // $data['waybill'] = $package->waybill;
                    // $data['refnum'] = $package->refnum;
                    // $data['upload_wbn'] = $response->upload_wbn;

                    $order->delhivery_waybill = $package->waybill;
                    $order->delhivery_refnum = $package->refnum;
                    $order->delhivery_upload_wbn = $response->upload_wbn;

                    $order->save();

                    return $order;
                } else {
                    Log::error($package->remarks[0]);
                    return false;
                }
            } else
                break;
        }
    }

    public function createOrderFormParams($order)
    {
        $pickup_location = array(
            "name" => "VENTTURA 0068588"
        );

        $shipments = array(
            "add" => $order->shippingAddress->address_in_string,
            "phone" => $order->shippingAddress->phone_no,
            "payment_mode" => "Prepaid",
            "name" => $order->shippingAddress->first_name . ' ' .  $order->shippingAddress->last_name ,
            "pin" => $order->shippingAddress->pin_code,
            "order" => "Order-id-" . $order->id,
        );

        $params = json_encode(
            array(
                'shipments' => array($shipments),
                'pickup_location' => $pickup_location,
            )
        );

        return $params;
    }
}
