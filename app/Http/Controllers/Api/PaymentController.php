<?php

namespace App\Http\Controllers\Api;

use hb\epay\HBepay;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id', // Проверяем, что пользователь существует
            'amount' => 'required|numeric|min:1', // Проверяем, что сумма больше 0

        ]);

        $user = User::find($request->user_id);

        $invoiceId = uniqid('inv_');

        $pay_order = new HBepay();
        $response = $pay_order->gateway(
            "test",
            "test",
            "yF587AV9Ms94qN2QShFzVR3vFnWkhjbAK3sG",
            "67e34d63-102f-4bd1-898e-370781d0074d",
            $invoiceId, // Используем сгенерированный инвойс ID
            $request->amount, // Используем сумму из запроса
            "KZT",
            "https://example.kz/success.html",
            "https://example.kz/failure.html",
            "https://example.kz/",
            "https://example.kz/order/1123/fail",
            "RU",
            "HB payment gateway",
            "test1",
            "",
            ""
        );

        if ($response['status'] == 'success') {
            $user->balance += $request->amount;
            $user->save();

            return response()->json([
                'message' => 'Payment successful',
                'invoice_id' => $invoiceId,
                'new_balance' => $user->balance,
            ]);
        } else {
            return response()->json([
                'message' => 'Payment failed',
                'error' => $response['error'] ?? 'Unknown error',
            ], 400);
        }
    }
}
