<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = Contact::all();
        return view('admin.contact.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function edit($id)
    {
        $obj = Contact::findOrFail($id);
        return view('admin.contact.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = Contact::findOrFail($id);
        $request->validate([
            'phone' => 'required',
            'phone1' => 'nullable',
            'phone2' => 'nullable',
            'phone3' => 'nullable',
            'phone4' => 'nullable',
            'email' => 'required',
            'fax' => 'required',
            'adress_tm' => 'required',
            'adress_ru' => 'nullable',
            'adress_en' => 'nullable',
            'slogan_tm' => 'required',
            'slogan_ru' => 'nullable',
            'slogan_en' => 'nullable',
        ]);

        $obj->phone = $request->phone;
        $obj->phone1 = $request->phone1 ?: null;
        $obj->phone2 = $request->phone2 ?: null;
        $obj->phone3 = $request->phone3 ?: null;
        $obj->phone4 = $request->phone4 ?: null;
        $obj->fax = $request->fax;
        $obj->email = $request->email;
        $obj->adress_tm = $request->adress_tm;
        $obj->adress_ru = $request->adress_ru ?: null;
        $obj->adress_en = $request->adress_en ?: null;
        $obj->slogan_tm = $request->slogan_tm;
        $obj->slogan_ru = $request->slogan_ru ?: null;
        $obj->slogan_en = $request->slogan_en ?: null;
        $obj->update();

        $success = $obj->getName() . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.contact.index')
            ->with([
                'success' => $success
            ]);
    }
}
