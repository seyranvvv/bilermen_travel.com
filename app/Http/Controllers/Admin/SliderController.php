<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;
class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = Slider::orderBy('id', 'desc')
            ->paginate(10);
        return view('admin.slider.index')
            ->with([
                'objs' => $objs,
            ]);
    }


    public function create()
    {
        return view('admin.slider.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title_tm' => 'nullable|string|max:350',
            'title_ru' => 'nullable|string|max:350',
            'title_en' => 'nullable|string|max:350',
            'url' => 'nullable|string|max:250',
            'body_tm' => 'nullable',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
            'image_tm' => 'nullable|image|mimes:jpg,jpeg,png|dimensions:width=1290,height=680',
            'image_ru' => 'nullable|image|mimes:jpg,jpeg,png|dimensions:width=1290,height=680',
            'image_en' => 'nullable|image|mimes:jpg,jpeg,png|dimensions:width=1290,height=680',
        ]);

        $obj = new Slider();
        $obj->url = $request->url ?: null;
        $obj->title_tm = $request->title_tm ?: null;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->body_tm = $request->body_tm ?: null;
        $obj->body_ru = $request->body_ru ?: null;
        $obj->body_en = $request->body_en ?: null;
        $obj->status = $request->has('status') ? true : false;
        if ($request->hasfile('image_tm')) {
            $newImage = $request->file('image_tm');
            $newImageName = Str::random(10) . '.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string)$image->encode('jpg', 80);
            $imagePath = 'public/s/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string)$smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/s/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_tm = 's/' . $newImageName;
        }
        if ($request->hasfile('image_ru')) {
            $newImage = $request->file('image_ru');
            $newImageName = Str::random(10) . '.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string)$image->encode('jpg', 80);
            $imagePath = 'public/s/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string)$smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/s/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_ru = 's/' . $newImageName;
        }
        if ($request->hasfile('image_en')) {
            $newImage = $request->file('image_en');
            $newImageName = Str::random(10) . '.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string)$image->encode('jpg', 80);
            $imagePath = 'public/s/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string)$smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/s/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_en = 's/' . $newImageName;
        }
        $obj->save();

        $success =  trans('transAdmin.created');
        return redirect()->route('admin.sliders.index')
            ->with([
                'success' => $success
            ]);
    }


    public function edit($id)
    {
        $obj = Slider::findOrFail($id);
        return view('admin.slider.edit')
            ->with([
                'obj' => $obj,
            ]);
    }


    public function update(Request $request, $id)
    {
        $obj = Slider::findOrFail($id);
        $request->validate([
            'title_tm' => 'nullable|string|max:350',
            'title_ru' => 'nullable|string|max:350',
            'title_en' => 'nullable|string|max:350',
            'url' => 'nullable|string|max:250',
            'body_tm' => 'nullable',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
            'image_tm' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=1290,height=680',
            'image_ru' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=1290,height=680',
            'image_en' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:width=1290,height=680',
        ]);

        $obj->url = $request->url ?: null;
        $obj->title_tm = $request->title_tm ?: null;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->body_tm = $request->body_tm ?: null;
        $obj->body_ru = $request->body_ru ?: null;
        $obj->body_en = $request->body_en ?: null;
        $obj->status = $request->has('status') ? true : false;
        if ($request->hasfile('image_tm')) {
            if ($obj->image_tm) {
                Storage::delete('public/' . $obj->image_tm);
                Storage::delete('public/sm/' . $obj->image_tm);
            }
            $newImage = $request->file('image_tm');
            $newImageName = Str::random(10) . '.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string)$image->encode('jpg', 80);
            $imagePath = 'public/s/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string)$smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/s/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_tm = 's/' . $newImageName;
        }
        if ($request->hasfile('image_ru')) {
            if ($obj->image_ru) {
                Storage::delete('public/' . $obj->image_ru);
                Storage::delete('public/sm/' . $obj->image_ru);
            }
            $newImage = $request->file('image_ru');
            $newImageName = Str::random(10) . '.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string)$image->encode('jpg', 80);
            $imagePath = 'public/s/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string)$smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/s/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_ru = 's/' . $newImageName;
        }
        if ($request->hasfile('image_en')) {
            if ($obj->image_en) {
                Storage::delete('public/' . $obj->image_en);
                Storage::delete('public/sm/' . $obj->image_en);
            }
            $newImage = $request->file('image_en');
            $newImageName = Str::random(10) . '.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string)$image->encode('jpg', 80);
            $imagePath = 'public/s/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string)$smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/s/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_en = 's/' . $newImageName;
        }
        $obj->update();

        $success = trans('transAdmin.updated');
        return redirect()->route('admin.sliders.index')
            ->with([
                'success' => $success
            ]);
    }


    public function delete($id)
    {
        $obj = Slider::findOrFail($id);
        if ($obj->image_tm) {
            Storage::delete('public/' . $obj->image_tm);
            Storage::delete('public/sm/' . $obj->image_tm);
        }
        if ($obj->image_ru) {
            Storage::delete('public/' . $obj->image_ru);
            Storage::delete('public/sm/' . $obj->image_ru);
        }
        if ($obj->image_en) {
            Storage::delete('public/' . $obj->image_en);
            Storage::delete('public/sm/' . $obj->image_en);
        }
        $objName = $obj->getTitle();
        $obj->delete();
        $success = $objName . ' ' . trans('transAdmin.deleted');
        return redirect()->route('admin.sliders.index')
            ->with([
                'success' => $success
            ]);
    }
}
