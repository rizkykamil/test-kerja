<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;




class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $httpMethod = 'POST'; // Replace with the actual HTTP method used
        $xApiKey = 'DATAUTAMA'; // Replace with the actual X-API-KEY value
        $signatureString = $httpMethod . ':' . $xApiKey;
        $signature = hash('sha256', $signatureString);
        // mendapatkan price
        $product = Product::find($request->product_id);
        $price = $product->price;
        // mendapatkan payment_amount
        $payment_amount = $price * $request->quantity;

        $response = Http::withHeaders([
            'X-API-KEY' => $xApiKey,
            'X-SIGNATURE' => $signature,
        ])->post('http://tes-skill.datautama.com/test-skill/api/v1/transactions')->json();

        // $this->validate($request, [
        //     'quantity' => 'required|integer|min:1',
        //     'product_id' => 'required|integer|min:1',
        //     'price' => 'required|integer|min:1',
        // ]);

        $product = Product::find($request->product_id);
        $price = $product->price;

        $payment_amount = $price * $request->quantity;

        // Generate reference number
        $reference_no = $signature;

            // Simpan transaksi
            $transaction = Transaksi::create([
                'quantity' => $request->quantity,
                'product_id' => $request->product_id,
                'price' => $price,
                'payment_amount' => $payment_amount,
                'reference_no' => $reference_no,
            ]);

        // Kembalikan respons
        return response()->json([
            'code' => "20000",
            'message' => "OK",
            'data' => [
                'reference_no' => $reference_no,
                'quantity' => $request->quantity,
                'price' => $price,
                'payment_amount' => $payment_amount,
            ]
        ]);
    }
}
