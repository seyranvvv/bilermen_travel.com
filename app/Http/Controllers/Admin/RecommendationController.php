<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Recommendation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecommendationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = Recommendation::orderBy('id')
            ->paginate(10);
        return view('admin.recommendation.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function create()
    {
        return view('admin.recommendation.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|string|max:150|unique:greets,name',
            'image' => 'required|image|mimes:jpg,jpeg,png|dimensions:width=370,height=410',

        ]);
        $obj = new Recommendation();
        $obj->name = $request->name;
        if ($request->hasfile('image')) {
            $newImg = $request->file('image');
            $newImgName =  rand(100, 9999) . '.' . $newImg->getClientOriginalExtension();
            $originalPath = 'public/recommendation/';
            $newImg->storeAs($originalPath, $newImgName);
            $obj->image = 'recommendation/' . $newImgName;
        }
        $obj->save();

        $success = trans('transFront.flag') . ': <b>' . $obj->name . '</b>, '
            . trans('transAdmin.created');
        return redirect()->route('admin.recommendation.index')
            ->with([
                'success' => $success
            ]);
    }


    public function edit($id)
    {
        $obj = Recommendation::findOrFail($id);
        return view('admin.recommendation.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = Recommendation::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:150',
            'image' => 'required|image|mimes:jpg,jpeg,png|dimensions:width=370,height=410',

        ]);
        $obj->name = $request->name;

        if ($obj->imgage) {
            Storage::delete('public/recommendation/'.$obj->imgage);
        }
        if ($request->hasfile('image')) {
            $newImg = $request->file('image');
            $newImgName =  rand(100, 9999) . '.' . $newImg->getClientOriginalExtension();
            $originalPath = 'public/recommendation/';
            $newImg->storeAs($originalPath, $newImgName);
            $obj->image = 'recommendation/' . $newImgName;
        }
        $obj->update();

        $success = $obj->name . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.recommendation.index')
            ->with([
                'success' => $success
            ]);
    }

    public function delete($id)
    {
        $obj = Recommendation::findOrFail($id);
        $objName = trans('transAdmin.name') . ': <b>' . $obj->name . '</b>';
        $obj->delete();
        $success = $objName . ' ' . trans('transAdmin.deleted');
        return redirect()->route('admin.recommendation.index')
            ->with([
                'success' => $success
            ]);
    }
}
