<?php

namespace App\Http\Controllers\Admin;

use App\WhyChooseUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class WhyChooseUsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = WhyChooseUs::orderBy('name_tm')
            ->paginate(10);
        return view('admin.why-choose-us.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function edit($id)
    {
        $obj = WhyChooseUs::findOrFail($id);
        return view('admin.why-choose-us.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = WhyChooseUs::findOrFail($id);
        $request->validate([
            'title_tm' => 'required',
            'name_tm' => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
            'body_tm' => 'required',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=938,height=971',



        ]);
        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->name_en = $request->name_en ?: null;

        $obj->body_tm = $request->body_tm;
        $obj->body_ru = $request->body_ru ?: null;
        $obj->body_en = $request->body_en ?: null;

        if ($request->hasfile('image'))
        {
            if ($obj->img) {
                Storage::delete('public/why-choose-us/image/'.$obj->img);
                Storage::delete('public/why-choose-us/slider/'.$obj->img);
                Storage::delete('public/why-choose-us/slider/placeholder/'.$obj->img);
                Storage::delete('public/why-choose-us/thumbnail-big/'.$obj->img);
                Storage::delete('public/why-choose-us/thumbnail-small/'.$obj->img);
                Storage::delete('public/why-choose-us/admin/'.$obj->img);
            }
            $originalImage = $request->file('image');
            $originalImageName = str_random(10).'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/why-choose-us/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/why-choose-us/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/why-choose-us/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/why-choose-us/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/why-choose-us/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/why-choose-us/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }


        $obj->update();

        $success = $obj->getName() . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.why-choose-us.index')
            ->with([
                'success' => $success
            ]);
    }
}
