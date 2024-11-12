<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Excel;
use App\Models\Parcel;
use App\Models\Recipient;
use App\Models\ParcelGood;
use Illuminate\Http\Request;
use App\Models\DeliveryMode;
use Illuminate\Support\Facades\DB;
use App\Models\AdditionalFunction;
use Illuminate\Support\Facades\Gate;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Component\HttpFoundation\Response;


class ParcelController extends Controller
{
	public function index(Request $request)
    {
        abort_if(Gate::denies('parcels'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $all = $request->get('parcel') === 'all';
        if ($all) {
            $items = Parcel::where('id', '!=', 0);
        } else {
            $items = Parcel::when(request('out'), function ($q) {
                $q->where('country_out', request('out'));
            })
                ->when(request('city') && request('out', 6) != 15, function ($q) {
                    $q->where('city', 'like', request('city') . '%');
                })
//				->where('created_at', '>=', request('ds', now()->subMonth()->format('Y-m-d')))
//        		->where('created_at', '<=', request('de', now()->format('Y-m-d')) . ' 23:59')
                ->when(request('in_status'), function ($q) {
                    $q->where('in_status', request('in_status') - 1);
                })
                ->when(request('in_city'), function ($q) {
                    if (request('in_city') == 1)
                        $q->whereNotIn('in_city', ['Нур-Султан', 'Алматы']);
                    else
                        $q->where('in_city', request('in_city'));
                })
                ->when(Auth::user()->city, function ($q) {
                    $q->where('city', Auth::user()->city);
                })
                ->when(request('s'), function ($q) {
                    $q->where(function ($q) {
                        $q->where('user_id', request('s'))
                            ->orWhere('track', 'like', '%' . request('s') . '%');
                    });
                })
                ->when(request('track'), function ($q) {
                    $q->where('track', 'like', '%' . request('track') . '%');
                })
                ->when(request('user_id'), function ($q) {
                    $q->where('user_id', request('user_id'));
                });
        }

        $count_ = clone $items;

        $items = $items->where('status', $request->input('status', 0))->orderBy('id', 'desc')->paginate(50);
        $count_ = $count_->select(DB::raw('count(*) as c,status'))->groupBy('status')->get();
        $count = [];

        foreach ($count_ as $p)
        {
            $count[$p->status] = $p->c;
        }

        $items->appends(request()->except('page'));

        if (request('page') && $count[request('status', 0)] < request('page', 1) * 50 - 50)
            return redirect()->route('parcels.index', array_replace(request()->all(), ['page' => 1]));

        return view('admin.parcels.index', compact('items', 'count', 'all'));
    }

    public function create()
    {
        abort_if(Gate::denies('parcels'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item = new Parcel();
        $users = Recipient::pluck('name', 'id');
        $functions = AdditionalFunction::pluck('name');
        $deliveryMode = DeliveryMode::where('parcel_id')->first();
        $deliveryMethod = $deliveryMode ? $deliveryMode->delivery_method : null;
        $deliveryAddress = $deliveryMode ? $deliveryMode->delivery_address : null;
        return view('admin.parcels.form', compact('item', 'users', 'functions','deliveryMethod', 'deliveryAddress'));
    }

    public function store(Request $request)
    {
        if ($request['prod_price'] === null) {
            $request['prod_price'] = 0;
        }
        abort_if(Gate::denies('parcels'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'recipient_id' => 'required|exists:recipients,id',
            'goods' => 'required|array|min:1',
            'goods.name.*' => 'required',
            'goods.price.*' => 'required',
            'additional_functions' => 'nullable',
            'additional_functions.*' => 'exists:additional_functions,id',
            'city_out' => 'required|in:1,2', // Добавьте валидацию для поля city_out
        ]);

        $item = Parcel::create(array_merge($request->all(), ['name' => $request->track]));
        $input_goods = $request->input('goods');
        $goods = [];

        for ($i = 0; $i < count($input_goods['name']); $i++) {
            $goods[] = new ParcelGood([
                'parcel_id' => $item->id,
                'name' => $input_goods['name'][$i],
                'currency' => $input_goods['currency'][$i],
                'price' => $input_goods['price'][$i],
            ]);
        }

        $item->goods()->saveMany($goods);

        if ($request->has('additional_functions')) {
            $item->additionalFunctions()->sync($request->input('additional_functions'));
        }

        return redirect()->route('parcels.index');
    }

    public function edit(Parcel $item, $id)
    {
        abort_if(Gate::denies('parcels'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item = Parcel::findOrFail($id);
        $users = Recipient::pluck('name', 'id');
        $functions = AdditionalFunction::pluck('name');
        $deliveryMode = DeliveryMode::where('parcel_id', $id)->first();
        $deliveryMethod = $deliveryMode ? $deliveryMode->delivery_method : null;
        $deliveryAddress = $deliveryMode ? $deliveryMode->delivery_address : null;
        return view('admin.parcels.form', compact('item', 'users','functions', 'deliveryMethod', 'deliveryAddress'));
    }

    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('parcels'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'track' => 'required|max:190',
            'recipient_id' => 'required|exists:recipients,id',
            'additional_functions' => 'nullable',
            'additional_functions.*' => 'exists:additional_functions,id',
            'city_out' => 'required|in:1,2', // Добавьте валидацию для поля city_out
        ]);

        $item = Parcel::findOrFail($id);
        $prod_price = $item->prod_price;
        $fill = $request->all();
        $fill['prod_price'] = str_replace(',', '.', $fill['prod_price']);

        if ($request->status == 10 && !$item->payed) {
            unset($fill['status']);
        }

        $item->update($fill);
        $item->update(['user_id' => $item->recipient->user_id]);

        // Обновление дополнительных услуг
        if ($request->has('additional_functions')) {
            $item->additionalFunctions()->sync($request->input('additional_functions'));
        } else {
            $item->additionalFunctions()->detach();
        }

        if ($fill['prod_price'] == $prod_price) {
            return redirect()->route('parcels.index');
        }
    }

    public function delete(Request $request)
    {
        abort_if(Gate::denies('parcels'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (count($request->input('id', [])))
            Parcel::whereIn('id', $request->input('id', []))->delete();
        return redirect()->route('parcels.index');
    }

    public function changeStatus(Request $request, $status)
    {
        abort_if(Gate::denies('parcels'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if (count($request->input('id', []))){
            Parcel::whereIn('id', $request->input('id', []))->update(['status' => (int)$status]);
        }
        return $status;
    }

    public function upload(Request $request)
    {
        if ($request->file('file'))
        {
            $item = Excel::create();
            $item->addMediaFromRequest('file')->toMediaCollection('excel');
            return redirect()->route('parcels.excel', $item->id);
        }
    }

    public function load(Request $request, $status = 0)
    {
        if (!$request->input('out') || $request->input('out') == 0)
        {
            $out = 6;
        } else {
            $out = $request->input('out');
        }

        $items = Parcel::select(['user_id', 'track', 'city', 'name', 'weight', 'status', 'integration_id', 'date_out'])->where('status', $status)
            ->where('country_out', $out)
            ->where('created_at', '>=', request('ds', now()->subMonth()->format('Y-m-d')) . ' 00:00')
            ->where('created_at', '<=', request('de', now()->format('Y-m-d')) . ' 23:59')
            ->get();

        $parcels = [];

        $status = __('ui.status');

        $test = '';
        foreach ($items as $item)
        {
            $parcels[] = [
                'Трек-номер' => $item->track,
                'UID' => $item->user_id,
                'Вес' => $item->weight,
                'Дата' => null,
                'Статус' => $status[$item->status],
                'ИТ' => $item->integration_id,
                'Наименование' => $item->name,
                'Стоимость' => $item->prod_price,
                'Город доставки' => $item->city,
            ];
        }
        $list = collect($parcels);

        return (new FastExcel($list))->download('file.xlsx');
    }

    public function excel(Request $request, $id)
    {
        $item = Excel::find($id);
        $t = $request->input('t', '');

        $spreadsheet = IOFactory::load(storage_path('app/public/' . $item->getMedia('excel')->first()->id . '/' . $item->getMedia('excel')->first()->file_name));
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $tracks = [];
        $tracks6 = [];
        $isset = [];
        $items2 = [];
        $tracks_full = [];
        foreach ($sheetData as $i => $c) {
            if ($i == 1) continue;
            if ($c['A']) {
                $tracks[] = $c['A'];
                $tracks6[] = substr($c['A'], -6);
                $isset[$c['A']] = $c['A'];
                $tracks_full[] = [$c['A'], $c['B'], $c['C'] ?? '', $c['D'] ?? '', $c['E'] ?? '', $c['F'] ?? ''];
            }
        }

        $items0 = Parcel::whereIn('track', $tracks)->get();

        $items1 = Parcel::whereNotIn('track', $tracks)->where(function ($q) use ($tracks6) {
            foreach ($tracks6 as $track) {
                $q->orWhere('track', 'LIKE', '%' . $track . '%');
            }
        })->get();

        foreach ($items0 as $item) {
            if (isset($isset[(string)$item->track]))
                unset($isset[(string)$item->track]);
        }

        foreach ($items1 as $item) {
            foreach ($isset as $k => $is) {
                if (strpos((string)$item->track, (string)$is) !== false)
                    unset($isset[$k]);
            }
        }

        foreach ($isset as $track) {
            $item = new Parcel();
            $item->track = $track;
            $items2[] = $item;
        }

        return view('admin.parcels.excel', compact('items0', 'items1', 'items2', 'id', 't', 'tracks', 'tracks6', 'tracks_full'));
    }

    public function replace(Request $request, $id)
    {
        $status = array_flip(__('ui.status'));
        if ($request->input('pid')) {
            $item = Parcel::find($request->input('pid'));

            if ($request->input('p')) {
                $item->pid = $request->input('p');
            }
            if ($request->input('r')) {
                $item->track = $request->input('r');
            }
            if ($request->input('w')) {
                $item->weight = str_replace(',', '.', $request->input('w'));
                $item->prod_price = $item->weight * $item->user->tariff[$item->country_out] + ($item->country_out > 6 && $item->weight < 1 ? 3.5 : 0);
            }
            if ($request->input('d')) {
                $item->date_out = Carbon::parse($request->input('d'))->format('Y-m-d');
            }
            if ($request->input('it')) {
                $item->in_track = $request->input('it');
            }

            if (isset($status[$request->input('status')]))
                $item->status = $status[$request->input('status')];

            $item->save();
        }
        return redirect()->route('parcels.excel', $id);
    }

    public function replaces(Request $request, $id)
    {
        if (!is_array(request('id')))
            return redirect()->route('parcels.excel', $id);
        $status = array_flip(__('ui.status'));
        $r = $request->all();

        foreach ($r['id'] as $parcel_id) {
            if (isset($r['status'][$parcel_id])) {
                $item = Parcel::find($parcel_id);

                if ($r['r'][$parcel_id] ?? '')
                    $item->track = $r['r'][$parcel_id];

                if ($r['p'][$parcel_id] ?? '')
                    $item->pid = $r['p'][$parcel_id];

                if ($r['w'][$parcel_id] ?? '') {
                    $item->weight = str_replace(',', '.', $r['w'][$parcel_id]);
                    $item->prod_price = $item->weight * $item->user->tariff[$item->country_out] + ($item->country_out > 6 && $item->weight < 1 ? 3.5 : 0);
                }

                if ($r['d'][$parcel_id] ?? '')
                    $item->date_out = Carbon::parse($r['d'][$parcel_id])->format('Y-m-d');

                if ($r['it'][$parcel_id] ?? '')
                    $item->in_track = $r['it'][$parcel_id];


                if ($r['status'][$parcel_id] ?? '')
                $item->status = $status[$r['status'][$parcel_id]];

                $item->save();
            }
        }
        return redirect()->route('parcels.excel', $id);
    }
}
