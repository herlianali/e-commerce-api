<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Xendit\Configuration;
use Illuminate\Support\Str;
use Xendit\Invoice\InvoiceApi;

class PaymentController extends Controller
{
    public function __construct()
    {
        Configuration::setXenditKey('xnd_development_FA31rhRG63alWCAFgA0huelp4pMpi73FzMejY1ZRkgO1NzNCZ0QW1T3t9DScTRS');
    }

    public function store(Request $request){

        // $params = [
        //     'external_id' => (string) Str::uuid(),
        //     'payer_email' => $request->payer_email,
        //     'description' => $request->description,
        //     'amount' => $request->amount,
        //     'redirect_url' => 'bursa-kain.com'
        // ];

        $apiInstance = new InvoiceApi();
        $createInvoice = new \Xendit\Invoice\CreateInvoiceRequest([
            'external_id' => 'test1234',
            'description' => 'Test Invoice',
            'amount' => 10000,
            'invoice_duration' => 172800,
            'currency' => 'IDR',
            'reminder_time' => 1
        ]); // \Xendit\Invoice\CreateInvoiceRequest
        $for_user_id = "8438e679-646f-4612-b9cb-c3d26b787fd9"; // string | Business ID of the sub-account merchant (XP feature)

        // $createInvoice = new \Xendit\Invoice\CreateInvoiceRequest($params);

        try {
            $result = $apiInstance->createInvoice($createInvoice, $for_user_id);
            print_r($result);
        } catch (\Xendit\XenditSdkException $e) {
            echo 'Exception when calling InvoiceApi->createInvoice: ', $e->getMessage(), PHP_EOL;
            echo 'Full Error: ', json_encode($e->getFullError()), PHP_EOL;
        }
        
        // Save to database
        // $payment = new Payment;
        // $payment->status = 'pending';
        // $payment->checkout_link = $createInvoice['invoice_url'];
        // $payment->external_id = $params['external_id'];
        // $payment->save();

        // return response()->json(['data' => $createInvoice['invoice_url']]);
    }
}
