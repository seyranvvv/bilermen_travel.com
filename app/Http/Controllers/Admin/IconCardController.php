<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\IconCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IconCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = IconCard::orderBy('type', 'desc')
            ->get();
        return view('admin.iconCards.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function edit($id)
    {
        $obj = IconCard::findOrFail($id);
        return view('admin.iconCards.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = IconCard::findOrFail($id);
        $request->validate([
            'text' => 'nullable|string',
'text_en' => 'nullable|string',

'text_ru' => 'nullable|string',
            'name' => 'required|string',
'name_en' => 'nullable|string',

'name_ru' => 'nullable|string',

            'counter' => 'required|string',
            'icon' => 'nullable|image|mimes:svg,png|max:2048',

        ]);


        $obj->text = $request->text ?: null;
        $obj->text_en = $request->text_en ?: null;

        $obj->text_ru = $request->text_ru ?: null;


        $obj->name = $request->name?: null;
        $obj->name_en = $request->name_en ?: null;

        $obj->name_ru = $request->name_ru ?: null;


        $obj->counter = $request->counter ?: null;
        $obj->after_text = $request->after_text ?: null;


        if ($request->hasfile('icon')) {
            if ($obj->icon) {
                Storage::delete('public/icon/' . $obj->icon);
            }
            $newImg = $request->file('icon');
            $newImgName =  rand(100, 9999) . '.' . $newImg->getClientOriginalExtension();
            $originalPath = 'public/icon/';
            $newImg->storeAs($originalPath, $newImgName);
            $obj->icon = '/' . $newImgName;
        }

        $obj->update();

        $success = trans('transAdmin.updated');
        return redirect()->route('admin.iconCards.index')
            ->with([
                'success' => $success
            ]);
    }

}
