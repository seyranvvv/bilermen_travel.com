<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = Category::orderBy('id')
            ->paginate(10);
        return view('admin.category.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {

        $request->validate([

            'name_tm' => 'required|string|max:150',
            'name_ru' => 'nullable|string|max:150',
            'name_en' => 'nullable|string|max:150',

        ]);
        $obj = new Category();
        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->name_en = $request->name_en ?: null;


        $obj->save();




        $success = trans('transAdmin.category') . ': <b>' . $obj->getName() . '</b>, '
            . trans('transAdmin.created');
        return redirect()->route('admin.category.index')
            ->with([
                'success' => $success
            ]);

    }


    public function edit($id)
    {
        $obj = Category::findOrFail($id);
        return view('admin.category.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = Category::findOrFail($id);
        $request->validate([
            'name_tm' => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
        ]);

        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->name_en = $request->name_en ?: null;
        $obj->update();

        $success = $obj->getName() . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.category.index')
            ->with([
                'success' => $success
            ]);
    }

    public function delete($id)
    {
        $obj = Category::findOrFail($id);
        $objName = trans('transAdmin.category') . ': <b>' . $obj->getName() . '</b>';
        $obj->delete();
        $success = $objName . ' ' . trans('transAdmin.deleted');
        return redirect()->route('admin.category.index')
            ->with([
                'success' => $success
            ]);
    }
}
