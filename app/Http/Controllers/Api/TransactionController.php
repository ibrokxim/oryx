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
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'invoice_id' => 'required|string',
            'tenge' => 'required|numeric',
            'type' => 'required|integer',
            'outgo' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $transaction = Transaction::create([
            'user_id' => $request->input('user_id'),
            'order' => $request->input('invoice_id'),
            'tenge' => $request->input('tenge'),
            'type' => $request->input('type'),
            'outgo' => $request->input('outgo'),
        ]);

        return response()->json(['message' => 'Транзакция успешно создана', 'transaction' => $transaction], 201);
    }
    public function pay(Request $request, $id)
    {
        $currency = Setting::where('code', 'currency')->first()->value;
        $parcel = Parcel::where([['user_id', Auth::user()->id], ['id', $id]])->first();

        if (!$parcel) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($parcel->payed == 1) {
            return response()->json(['error' => 'Order already paid'], 400);
        }

        DB::beginTransaction();

        try {
            $user = Auth::user();
            if ($user->balance == 0 || $user->balance < $parcel->prod_price) {
                DB::rollBack();
                return response()->json(['error' => 'У вас недостаточно средств'], 400);
            }

            if ($user->deductBalance($parcel->prod_price)) {
                $transaction = Transaction::create([
                    'user_id' => $user->id,
                    'parcel_id' => $parcel->id,
                    'count' => $parcel->prod_price,
                    'tenge' => round($parcel->prod_price * $currency, 2),
                    'type' => 1,
                    'outgo' => 1,
                ]);

                $parcel->payed = 1;
                $parcel->save();

                DB::commit();
                return response()->json(['message' => 'Payment successful']);
            }
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Payment failed', [
                'error_message' => $e->getMessage(),
                'error_trace' => $e->getTraceAsString(),
                'user_id' => Auth::user()->id ?? 'Not authenticated'
            ]);

            return response()->json([
                'error' => 'Payment failed',
                'message' => $e->getMessage()
            ], 500);
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
                    'type' => 1,
                    'outgo' => 1,
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
