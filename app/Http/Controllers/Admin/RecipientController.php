<?php

namespace App\Http\Controllers\Admin;


use Gate;
use App\Models\Recipient;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


class RecipientController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('recipients'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $items = new Recipient();
		if($request->input('s','')){
            $items = $items->where(function($q) use ($request){
                $q->where('name', 'like', "%".$request->input('s')."%")
                ->orWhere('fname', 'like', "%".$request->input('s')."%")
                ->orWhere('user_id', 'like', "%".$request->input('s')."%")
                ->orWhere('surname', 'like', "%".$request->input('s')."%");
            });
        }
        if (Auth::user()->city) {
            $items = $items->where('city', Auth::user()->city);
        }
        if($request->input('status',0)){
            switch ($request->input('status',0)) {
                case 1:
                    $items = $items->where('confirm', 1);
                break;
                case 2:
                    $items = $items->where('confirm', 0)->where('registration','!=','');
                break;
                default:
                    $items = $items->where('confirm', 0)->where('registration', NULL);
                break;
            }
        }
		$items = $items->orderBy('created_at','desc')->paginate(50);
        return view('admin.recipients.index', compact('items'));
    }

    public function create()
    {
        abort_if(Gate::denies('recipients'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item = new Recipient();
        return view('admin.recipients.form', compact('item'));
    }

    public function store(Request $request)
    {
        abort_if(Gate::denies('recipients'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'name'   =>  'required|max:190',
        ]);

        Recipient::create($request->all());

        return redirect()->route('recipients.index');
    }

    public function edit(Recipient $item, $id)
    {
        abort_if(Gate::denies('recipients'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item = Recipient::findOrFail($id);
        return view('admin.recipients.form', compact('item'));
    }

    public function update(Request $request, $id)
    {
        abort_if(Gate::denies('recipients'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'name'   =>  'required|max:190',
        ]);

        $fill = $request->all();

        if($fill['confirm'])
            $fill['registration'] = '';

        $item = Recipient::findOrFail($id);
        $confirm = $item->confirm;
        $item->update($fill);

        if(!$confirm && $fill['confirm']){
            $item->update(['registration'=>'']);
            $this->sendNotifiaction($item->user, 'recipients_confirm', ['fio'=>$item->user->fio]);
        }

        return redirect()->route('recipients.index');
    }

    public function delete(Request $request)
    {
        abort_if(Gate::denies('recipients'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        Recipient::whereIn('id',$request->input('id',[]))->delete();
        return redirect()->route('recipients.index');
    }

    public function error(Request $request, $id)
    {
        abort_if(Gate::denies('recipients'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item = Recipient::where('id',$id)->first();
        if($item){
            $item->confirm = 0;
            $item->registration = $request->input('registration');
            $item->save();
            $this->sendNotifiaction($item->user, 'recipients_rejected', ['fio'=>$item->user->fio,'text' => $request->input('registration')]);
        }
        return redirect()->route('recipients.index');
    }

    public function file($id, $file) {
        abort_if(Gate::denies('recipients'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $item = Recipient::select(['id', 'files'])->findOrFail($id);
        $files = json_decode($item->files, true);
        $path = Arr::get($files, $file);
        $path = Storage::disk('private')->path($path);
        return response()->file($path);
    }
}
