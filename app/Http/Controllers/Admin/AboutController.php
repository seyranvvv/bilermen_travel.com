<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = About::orderBy('name_tm')
            ->paginate(10);
        return view('admin.about.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function edit($id)
    {
        $obj = About::findOrFail($id);
        return view('admin.about.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = About::findOrFail($id);
        $request->validate([
            'title_tm' => 'required',
            'name_tm' => 'required',
            'name_ru' => 'nullable',
            'name_en' => 'nullable',
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=364,height=350',
            'about_index' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=541,height=490',
            'icon' => 'mimes:jpeg,png,jpg,webp,svg|max:2048|dimensions:width=410,height=348',
            'about_banner' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=470,height=329',
            'body_tm' => 'required',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',


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
                Storage::delete('public/about/image/'.$obj->img);
                Storage::delete('public/about/slider/'.$obj->img);
                Storage::delete('public/about/slider/placeholder/'.$obj->img);
                Storage::delete('public/about/thumbnail-big/'.$obj->img);
                Storage::delete('public/about/thumbnail-small/'.$obj->img);
                Storage::delete('public/about/admin/'.$obj->img);
            }
            $originalImage = $request->file('image');
            $originalImageName = str_random(10).'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/about/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/about/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/about/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/about/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/about/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/about/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }
        if ($request->hasfile('icon'))
        {
            if ($obj->icon) {
                Storage::delete('public/about/image/'.$obj->icon);
                Storage::delete('public/about/slider/'.$obj->icon);
                Storage::delete('public/about/slider/placeholder/'.$obj->icon);
                Storage::delete('public/about/thumbnail-big/'.$obj->icon);
                Storage::delete('public/about/thumbnail-small/'.$obj->icon);
                Storage::delete('public/about/admin/'.$obj->icon);
            }
            $originalImage = $request->file('icon');
            $originalImageName = str_random(10).'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/about/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/about/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/about/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/about/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/about/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/about/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->icon= $originalImageName;
        }

        if ($request->hasfile('about_banner'))
        {

            if ($obj->about_banner) {
                Storage::delete('public/about_banner/image/'.$obj->img);
                Storage::delete('public/about_banner/slider/'.$obj->img);
                Storage::delete('public/about_banner/slider/placeholder/'.$obj->img);
                Storage::delete('public/about_banner/thumbnail-big/'.$obj->img);
                Storage::delete('public/about_banner/thumbnail-small/'.$obj->img);
                Storage::delete('public/about_banner/admin/'.$obj->img);
            }
            $originalImage = $request->file('about_banner');
            $originalImageName = str_random(10).'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/about_banner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);

            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/about_banner/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/about_banner/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/about_banner/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/about_banner/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/about_banner/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);

            $obj->image_banner = $originalImageName;
        }



        if ($request->hasfile('about_index')) {
            $newImage = $request->file('about_index');
            $newImageName = Str::random(10) . '.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string)$image->encode('jpg', 80);
            $imagePath = 'public/about_index/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string)$smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/about_index/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_index = 'about_index/' . $newImageName;
        }

        $obj->update();

        $success = $obj->getName() . ' ' . trans('transAdmin.updated');
        return redirect()->route('admin.about.index')
            ->with([
                'success' => $success
            ]);
    }
}
