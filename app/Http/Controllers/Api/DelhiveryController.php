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
        $this->token = env('DELHIVERY_API_TOKEN', 'e8eae4f58c53c6f8ba1215923fa2ccde7639b6d3');
        $this->baseUrl = 'https://staging-express.delhivery.com';
        $this->client = new Client([
            'base_uri' => $this->baseUrl
        ]);
    }

    public function index()
    {
        $url = 'https://staging-express.delhivery.com/c/api/pin-codes/json/?token=' . $this->token . '&filter_codes=302033';
        // $url = '/c/api/pin-codes/json/';
        // $url = 'https://staging-express.delhivery.com/c/api/pin-codes/json';

        // dump($this->baseUrl .  $url);

        $generatedUrl = '';

        $response = $this->client->request('GET', $url, [
            'query' => [
                // 'filter_codes' => '302021',
                'state_code' => 'RJ',
            ],
            'headers' => [
                'User-Agent' => 'ReadMe-API-Explorer',
                'Accept' => 'application/json',
                'Authorization' => 'Token ' . $this->token
            ],
            'on_stats' => function (TransferStats $stats) use (&$generatedUrl) {
                $generatedUrl = $stats->getEffectiveUri();
            }
        ])->getBody()->getContents();
        dd(json_decode($response));
    }

    public function checkPinCode()
    {
        $url = '/c/api/pin-codes/json/';
        $response = $this->client->request('GET', $url, [
            'query' => [
                'filter_codes' => request()->pin_code,
            ],
            'headers' => [
                'User-Agent' => 'ReadMe-API-Explorer',
                'Accept' => 'application/json',
                'Authorization' => 'Token ' . $this->token
            ],
        ])->getBody()->getContents();

        if (is_array($response) && count($response) > 1) {
            if (count($response) == 1)
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
                // 'waybill' => request()->waybill,
                'waybill' => '5106910000125',
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
                // 'wbns' => request()->waybill,
                'wbns' => '5106910000125',
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

    public function createOrder()
    {
        $url = '/api/cmu/create.json';
        $response = $this->client->request('POST', $url, [
            // 'form_params' => [$this->createOrderFormParams()],
            'form_params' => [
                'format' => 'json',
                'data' => $this->createOrderFormParams(),
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
                    $data['waybill'] = $package->waybill;
                    $data['refnum'] = $package->refnum;
                    $data['upload_wbn'] = $response->upload_wbn;
                    return $data;
                } else {
                    Log::error($package->remarks[0]);
                    return false;
                }
            } else
                break;
        }
    }

    public function createOrderFormParams()
    {
        $pickup_location = array(
            "name" => "VENTTURA 0068588"
        );

        $shipments = array(
            "add" => "M25,NelsonMarg",
            "phone" => '9887171241',
            "payment_mode" => "Prepaid",
            "name" => "name-of-the-consignee",
            "pin" => 325007,
            "order" => "orderid" . time(),
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
