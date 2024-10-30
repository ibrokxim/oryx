<?php

namespace App\Http\Controllers\Api;

use App\Models\Parcel;
use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function pay(Request $request, $id)
    {
        $currency = Setting::where('code', 'currency')->first()->value;
        $item = Parcel::where([['user_id', Auth::user()->id], ['id', $id]])->first();

        if (!$item) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($item->payed) {
            return response()->json(['error' => 'Order already paid'], 400);
        }

        if (Transaction::where('parcel_id', $item->id)->where('type', 1)->first()) {
            return response()->json(['error' => 'Order already paid'], 400);
        }

        DB::beginTransaction();

        try {
            $user = Auth::user();

            if ($user->deductBalance($item->prod_price)) {
                $tr = Transaction::create([
                    'user_id' => $user->id,
                    'parcel_id' => $item->id,
                    'count' => $item->prod_price,
                    'tenge' => round($item->prod_price * $currency, 2),
                    'type' => 1, // Предположим, что это тип транзакции для оплаты
                    'outgo' => 1, // Предположим, что это означает расход
                ]);

                $item->payed = 1;
                $item->save();

                DB::commit();
                return response()->json(['message' => 'Payment successful']);
            } else {
                DB::rollBack();
                return response()->json(['error' => 'Insufficient balance'], 400);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment failed: ' . $e->getMessage());
            return response()->json(['error' => 'Payment failed'], 500);
        }
    }

    public function payMany(Request $request)
    {
        $currency = Setting::where('code', 'currency')->first()->value;

        $items = Parcel::where([['user_id', Auth::user()->id], ['payed', 0]])->whereIn('id', $request->input('ids'))->get();
        if (!count($items)) {
            return response()->json(['error' => 'No orders found'], 404);
        }

        $ids = [];
        $prod_price = 0;
        foreach ($items as $item) {
            $ids[] = $item->id;
            $prod_price += $item->prod_price;
        }

        DB::beginTransaction();

        try {
            $user = Auth::user();

            if ($user->deductBalance($prod_price)) {
                $tr = Transaction::create([
                    'user_id' => $user->id,
                    'count' => $prod_price,
                    'tenge' => round($prod_price * $currency, 2),
                    'type' => 1, // Предположим, что это тип транзакции для оплаты
                    'outgo' => 1, // Предположим, что это означает расход
                ]);

                $tr->parcels()->sync($ids);

                foreach ($items as $item) {
                    $item->payed = 1;
                    $item->save();
                }

                DB::commit();
                return response()->json(['message' => 'Payment successful']);
            } else {
                DB::rollBack();
                return response()->json(['error' => 'Insufficient balance'], 400);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment failed: ' . $e->getMessage());
            return response()->json(['error' => 'Payment failed'], 500);
        }
    }
}
