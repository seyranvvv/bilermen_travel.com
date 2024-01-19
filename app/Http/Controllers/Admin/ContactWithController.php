<?php

namespace App\Http\Controllers\Admin;

use App\ContactWith;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactWithController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = ContactWith::all();
        return view('admin.contactWith.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function edit($id)
    {
        $obj = ContactWith::findOrFail($id);
        return view('admin.contactWith.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = ContactWith::findOrFail($id);
        $request->validate([
            'title_tm' => 'required',
            'title_ru' => 'nullable',
            'title_en' => 'nullable',
            'body_tm' => 'required',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
        ]);


        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->body_tm = $request->body_tm;
        $obj->body_ru = $request->body_ru ?: null;
        $obj->body_en = $request->body_en ?: null;
        $obj->update();

        $success = $obj->getTitle() . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.contactWith.index')
            ->with([
                'success' => $success
            ]);
    }
}
