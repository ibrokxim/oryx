<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    public function transactions(Request $request)
    {
        abort_if(Gate::denies('transactions'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tab = $request->get('tab', 'replenishment'); // Определяем текущую вкладку

        // Определяем фильтрацию данных в зависимости от вкладки
        if ($tab === 'replenishment') {
            $items = Transaction::where('outgo', 0)
                ->when(request('ds'), fn($q) => $q->where('created_at', '>=', request('ds')))
                ->when(request('de'), fn($q) => $q->where('created_at', '<=', request('de') . ' 23:59'))
                ->when(request('s'), function ($q) {
                    $q->where(function ($q) {
                        $q->where('user_id', request('s'))
                            ->orWhere('id', request('s'))
                            ->orWhere('order', 'like', '%' . request('s') . '%');
                    });
                })
                ->orderBy('id', 'desc')
                ->paginate(20);
        } elseif ($tab === 'payments') {
            $items = Transaction::where('outgo', 1)
                ->when(request('ds'), fn($q) => $q->where('created_at', '>=', request('ds')))
                ->when(request('de'), fn($q) => $q->where('created_at', '<=', request('de') . ' 23:59'))
                ->when(request('s'), function ($q) {
                    $q->where(function ($q) {
                        $q->where('user_id', request('s'))
                            ->orWhere('id', request('s'))
                            ->orWhere('order', 'like', '%' . request('s') . '%');
                    });
                })
                ->orderBy('id', 'desc')
                ->paginate(20);
        }

        return view('admin.ind.transactions', compact('items', 'tab'));
    }
}
