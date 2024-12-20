<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\AdditionalFunction;
use App\Http\Controllers\Controller;

class AdditionalFunctionsController extends Controller
{
    public function showAllAdditionalFunctions()
    {
        $addFunction = AdditionalFunction::query()->paginate(10);
        return view('admin.additional_functions.index', compact('addFunction'));
    }

    public function createAdditionalFunctions()
    {
        $addFunction = AdditionalFunction::all();
        return view('admin.additional_functions.create', compact('addFunction'));

    }
    public function storeAdditionalFunction(Request $request)
    {
       $validated = $request->validate([
          'name' => 'required',
          'text' => 'nullable',
          'price' => 'nullable',
       ]);
       $addFunction = new AdditionalFunction($validated);
       $addFunction->save();
       return redirect()->route('additional-functions.index')->with('success', 'Изменения сохранены успешно.');
    }

    public function editAdditionalFunction($id)
    {
        $additionalFunction = AdditionalFunction::findOrFail($id);
        return view('admin.additional_functions.edit', compact('additionalFunction'));
    }

    public function updateAdditionalFunction(Request $request, $id)
    {
        $validatedData = $request->validate([
           'name'=> 'required|max:255',
           'text'=> 'nullable|max:1000',
           'price'=> 'nullable',
        ]);
        $addFunction = AdditionalFunction::findOrFail($id);
        $addFunction->update($validatedData);
        return redirect()->route('additional-functions.index')->with('Функция успешно обновлена');
    }

    public function deleteAdditionalFunction($id)
    {
        $addFunction = AdditionalFunction::query()->findOrFail($id);
        $addFunction->delete();
        return redirect()->route('additional-functions.index')->with('Функция успешно удалена!');
    }
}
