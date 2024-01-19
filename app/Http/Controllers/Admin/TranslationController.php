<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = Translation::orderBy('name_tm')
            ->paginate(10000);
        return view('admin.translations.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function create()
    {
        return view('admin.translations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_tm' => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
        ]);

        $obj = new Translation();
        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->name_en = $request->name_en ?: null;

        $obj->save();

        return redirect()->route('admin.translations.index')
            ->with([

            ]);
    }



    public function edit($id)
    {
        $obj = Translation::findOrFail($id);
        return view('admin.translations.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = Translation::findOrFail($id);
        $request->validate([
            'name_tm' => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
        ]);
        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->name_en = $request->name_en ?: null;

        $obj->update();

        return redirect()->route('admin.translations.index')
            ->with([
            ]);
    }


    public function delete($id)
    {
        $obj = Goal::findOrFail($id);
        $obj->delete();
        $success = 'pozuldy!';
        return redirect()->route('admin.translations.index')->with([
            'success' => $success
        ]);
    }
}

