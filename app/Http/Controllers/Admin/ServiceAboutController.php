<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\ServiceAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class ServiceAboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = ServiceAbout::orderBy('name_tm')
            ->paginate(10);
        return view('admin.serviceAbout.index')
            ->with([
                'objs' => $objs,
            ]);
    }



    public function edit($id)
    {
        $obj = ServiceAbout::findOrFail($id);
        return view('admin.serviceAbout.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = ServiceAbout::findOrFail($id);
        $request->validate([
            'title_tm' => 'required',
            'name_tm' => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=541,height=489',
        ]);
        $slug = str_slug($request->title_tm);
        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->name_en = $request->name_en ?: null;

        if ($request->hasfile('image'))
        {
            if ($obj->img) {
                Storage::delete('public/serviceAbout/image/'.$obj->img);
                Storage::delete('public/serviceAbout/slider/'.$obj->img);
                Storage::delete('public/serviceAbout/slider/placeholder/'.$obj->img);
                Storage::delete('public/serviceAbout/thumbnail-big/'.$obj->img);
                Storage::delete('public/serviceAbout/thumbnail-small/'.$obj->img);
                Storage::delete('public/serviceAbout/admin/'.$obj->img);
            }
            $originalImage = $request->file('image');
            $originalImageName = $slug.'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/serviceAbout/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/serviceAbout/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/serviceAbout/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/serviceAbout/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/serviceAbout/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/serviceAbout/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }

        $obj->update();

        $success = $obj->getTitle() . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.serviceAbout.index')
            ->with([
                'success' => $success
            ]);
    }
}
