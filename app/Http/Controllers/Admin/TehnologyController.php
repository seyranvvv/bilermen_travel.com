<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tehnology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class TehnologyController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        $objs = Tehnology::orderBy('id', 'DESC')
            ->paginate(10);
        return view('admin.tehnology.index')
            ->with([
                'objs' => $objs,
            ]);

    }

    public function create() {
        return view('admin.tehnology.create');
    }


    public function store(Request $request) {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048',
            'title_tm' => 'required',
            'name_tm' => 'required',
            'body_tm' => 'required',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
        ]);

        $obj = new Tehnology();
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
            $originalImage = $request->file('image');
            $originalImageName = rand(100,999).'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/tehnology/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/tehnology/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/tehnology/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/tehnology/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/tehnology/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/tehnology/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }

        $obj->save();
        $success = '<b>' . '</b> Surat goşuldy!';
        return redirect()->route('admin.tehnology.index')->with([
            'success' => $success
        ]);
    }

    public function edit($id) {
        $obj = Tehnology::findOrFail($id);
        return view('admin.tehnology.edit', compact('obj'));
    }


    public function update(Request $request, $id) {
        $obj = Tehnology::findOrFail($id);
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048',

            'title_tm' => 'required',
            'name_tm' => 'required',
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
                Storage::delete('public/tehnology/image/'.$obj->img);
                Storage::delete('public/tehnology/slider/'.$obj->img);
                Storage::delete('public/tehnology/slider/placeholder/'.$obj->img);
                Storage::delete('public/tehnology/thumbnail-big/'.$obj->img);
                Storage::delete('public/tehnology/thumbnail-small/'.$obj->img);
                Storage::delete('public/tehnology/admin/'.$obj->img);
            }
            $originalImage = $request->file('image');
            $originalImageName = rand(100, 999).'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/tehnology/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/tehnology/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/tehnology/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/tehnology/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/tehnology/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/tehnology/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }

        $obj->update();

        $success = '<b>'. '</b> Surat düzedildi!';
        return redirect()->route('admin.tehnology.index')->with([
            'success' => $success
        ]);
    }


    public function delete($id)
    {
        $obj = Tehnology::findOrFail($id);
        if ($obj->img) {
            Storage::delete('public/tehnology/image/'.$obj->img);
            Storage::delete('public/tehnology/slider/'.$obj->img);
            Storage::delete('public/tehnology/slider/placeholder/'.$obj->img);
            Storage::delete('public/tehnology/thumbnail-big/'.$obj->img);
            Storage::delete('public/tehnology/thumbnail-small/'.$obj->img);
            Storage::delete('public/tehnology/admin/'.$obj->img);
        }
        $objName = $obj->title_tm;
        $obj->delete();
        $success = '<b>'.$objName.'</b> pozuldy!';
        return redirect()->route('admin.tehnology.index')->with([
            'success' => $success
        ]);
    }
}
