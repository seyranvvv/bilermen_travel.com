<?php

namespace App\Http\Controllers\Admin;

use App\Greet;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GreetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = Greet::orderBy('id')
            ->paginate(10);
        return view('admin.greet.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function create()
    {
        return view('admin.greet.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:150|unique:greets,name',
            'image' => 'required|image|mimes:jpg,jpeg,png|dimensions:width=167,height=80',
            'type' => 'required|string|in:top,bottom',

        ]);
        $obj = new Greet();
        $obj->name = $request->name;
        $obj->type = $request->type;
        if ($request->hasfile('image')) {
            $newImg = $request->file('image');
            $newImgName =  rand(100, 9999) . '.' . $newImg->getClientOriginalExtension();
            $originalPath = 'public/greets/';
            $newImg->storeAs($originalPath, $newImgName);
            $obj->image = 'greets/' . $newImgName;
        }
        $obj->save();

        $success = trans('transFront.flag') . ': <b>' . $obj->name . '</b>, '
            . trans('transAdmin.created');
        return redirect()->route('admin.greet.index')
            ->with([
                'success' => $success
            ]);
    }


    public function edit($id)
    {
        $obj = Greet::findOrFail($id);
        return view('admin.greet.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = Greet::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:150',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|dimensions:width=167,height=80',
            'type' => 'required|string|in:top,bottom',

        ]);
        $obj->name = $request->name;
        $obj->type = $request->type;

        if ($obj->imgage) {
            Storage::delete('public/greets/'.$obj->imgage);
        }
        if ($request->hasfile('image')) {
            $newImg = $request->file('image');
            $newImgName =  rand(100, 9999) . '.' . $newImg->getClientOriginalExtension();
            $originalPath = 'public/greets/';
            $newImg->storeAs($originalPath, $newImgName);
            $obj->image = 'greets/' . $newImgName;
        }
        $obj->update();

        $success = $obj->name . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.greet.index')
            ->with([
                'success' => $success
            ]);
    }

    public function delete($id)
    {
        $obj = Greet::findOrFail($id);
        $objName = trans('transAdmin.name') . ': <b>' . $obj->name . '</b>';
        $obj->delete();
        $success = $objName . ' ' . trans('transAdmin.deleted');
        return redirect()->route('admin.greet.index')
            ->with([
                'success' => $success
            ]);
    }
}
