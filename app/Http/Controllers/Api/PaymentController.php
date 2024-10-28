<?php

namespace App\Http\Controllers\Api;

use hb\epay\HBepay;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $invoiceId = Str::uuid()->toString();

        $userId = $request->user()->id;

        $pay_order = new HBepay();
        $response = $pay_order->gateway
        (
            "test",
            "test",
            "yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG",
            "67e34d63-102f-4bd1-898e-370781d0074d",
            $invoiceId,
            $validatedData['amount'],
            "KZT",
            "https://example.kz/success.html",
            "https://example.kz/failure.html",
            "https://example.kz/",
            "https://example.kz/order/1123/fail",
            "RU",
            "Перевод на счет в сайте oryx.kz",
            $userId,
            ""
        );

        if ($response['status'] === 'success') {
            $this->updateUserBalance($request->user(), $validatedData['amount']);
        }

        return response()->json($response);
    }

    protected function updateUserBalance(User $user, $amount)
    {
        $user->balance += $amount;
        $user->save();
    }
}
