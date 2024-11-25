<?php

namespace App\Http\Controllers\Api;

use hb\epay\HBepay;
use Illuminate\Support\Str;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
//    public function initializePayment(Request $request)
//    {
//        $request->validate([
//            'amount' => 'required|numeric|min:0',
//        ]);
//
//        $invoiceId = Str::uuid()->toString();
//        $userId = Auth::id();
//
//        $payment = new Transaction();
//        $payment->user_id = $userId;
//        $payment->order = $invoiceId;
//        $payment->count = $request->input('amount');
//        $payment->outgo = 0;
//        $payment->type = 0;
//        $payment->save();
//
//        return redirect()->route('payment.redirect', ['invoiceId' => $invoiceId]);
//    }
//
//    public function redirectToPaymentGateway($invoiceId)
//    {
//        $payment = Transaction::where('invoice_id', $invoiceId)->first();
//
//        if (!$payment) {
//            abort(404, 'Платеж не найден');
//        }
//        $pay_order = new HBepay();
//
//        try {
//            $response = $pay_order->gateway(
//                "",
//                "ORYX.KZ",
//                "m!$0bIlaTiwS$!4X",
//                "1a41f7ef-99c7-48c5-bca7-a5538c988aee",
//                $invoiceId,
//                $payment->count,
//                "KZT",
//                "https://example.kz/success.html",
//                "https://example.kz/failure.html",
//                "https://example.kz/",
//                "https://example.kz/order/{$invoiceId}/fail",
//                "RU",
//                "HB payment gateway",
//                "176301072",
//                "",
//                "ofis@orix.kz"
//            );
//
//            return $response;
//        } catch (\Exception $e) {
//            \Log::error('Payment Gateway Error: ' . $e->getMessage());
//            return back()->withError('Произошла ошибка при переходе к оплате.');
//        }
//    }
//
//    public function handlePaymentCallback(Request $request)
//    {
//        $invoiceId = $request->input('invoice_id');
//        $status = $request->input('status');
//
//        $payment = Transaction::where('invoice_id', $invoiceId)->first();
//
//        if ($payment) {
//            if ($status == 'success') {
//                $payment->status = 'completed';
//                $payment->save();
//
//            } else {
//                $payment->status = 'failed';
//                $payment->save();
//            }
//        }
//
//    }
}
