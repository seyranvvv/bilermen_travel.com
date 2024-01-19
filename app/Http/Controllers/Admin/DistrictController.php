<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = District::all();
        return view('admin.district.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function edit($id)
    {
        $obj = District::findOrFail($id);
        return view('admin.district.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = District::findOrFail($id);
        $request->validate([
            'phone' => 'required',

            'adress_tm' => 'required',
            'adress_ru' => 'nullable',
            'adress_en' => 'nullable',
            'name_tm' => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
        ]);

        $obj->phone = $request->phone;
        $obj->address_tm = $request->adress_tm;
        $obj->address_ru = $request->adress_ru ?: null;
        $obj->address_en = $request->adress_en ?: null;
        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->name_en = $request->name_en ?: null;
        $obj->update();

        $success = $obj->getName() . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.districts.index')
            ->with([
                'success' => $success
            ]);
    }
}
