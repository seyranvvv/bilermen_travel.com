<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service;
use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $objs = Service::orderBy('order')->paginate(10);
        return view('admin.service.index')
            ->with([
                'objs' => $objs,
            ]);
    }

    public function create()
    {
        return view('admin.service.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=290,height=197',
            // 'image_index' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=500,height=500',
            'image_index' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:height=500',
            'image_banner' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=1221,height=310',
            'icon' => 'mimes:jpeg,png,jpg,webp,svg|max:2048',
            'title_tm' => 'required',
            'name_tm' => 'required',
        ]);

        $obj = new Service();
        $slug = str_slug($request->title_tm);
        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->name_en = $request->name_en ?: null;
        $obj->slug = $slug;
        $obj->order = $request->order;
        $obj->active = ($request->has('active')) ? true : false;
        if ($request->hasfile('image')) {
            $originalImage = $request->file('image');
            $originalImageName = $slug . Str::random(10) .  '-image.' . $originalImage->getClientOriginalExtension();
            $originalPath = 'public/service/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) {
                $constraint->aspectRatio();
            });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/service/slider/' . $originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/service/slider/placeholder/' . $originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/service/thumbnail-big/' . $originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/service/thumbnail-small/' . $originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/service/admin/' . $originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }
        if ($request->hasfile('icon')) {


            $originalImage = $request->file('icon');
            $originalImageName = $slug . Str::random(10) . 'icon-.' . $originalImage->getClientOriginalExtension();
            $originalPath = 'public/service/image/';
            $originalImage->storeAs($originalPath, $originalImageName);

            $obj->icon = $originalImageName;
        }

        if ($request->hasfile('image_banner')) {
            $originalImage = $request->file('image_banner');
            $originalImageName = $slug . Str::random(10) . '-image_banner.' . $originalImage->getClientOriginalExtension();
            $originalPath = 'public/image_banner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) {
                $constraint->aspectRatio();
            });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/image_banner/slider/' . $originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/image_banner/slider/placeholder/' . $originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/image_banner/thumbnail-big/' . $originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/image_banner/thumbnail-small/' . $originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/image_banner/admin/' . $originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->image_banner = $originalImageName;
        }

        if ($request->hasfile('image_index')) {
            $newImage = $request->file('image_index');
            $newImageName = Str::random(10) . '-image_index.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string) $image->encode('jpg', 80);
            $imagePath = 'public/image_index/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string) $smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/image_index/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_index = 'image_index/' . $newImageName;
        }
        $obj->save();
        $success = '<b>' . '</b> Surat goşuldy!';
        return redirect()->route('admin.service.index')->with([
            'success' => $success
        ]);
    }

    public function edit($id)
    {
        $obj = Service::findOrFail($id);
        return view('admin.service.edit', compact('obj'));
    }


    public function update(Request $request, $id)
    {
        $obj = Service::findOrFail($id);
        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=290,height=197',
            'image_banner' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=1221,height=310',
            // 'image_index' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=500,height=500',
            'image_index' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:height=500',
            'icon' => 'mimes:jpeg,png,jpg,webp,svg|max:2048',

            'title_tm' => 'required',
            'name_tm' => 'required',

        ]);

        $slug = str_slug($request->title_tm);
        $obj->slug = $slug;
        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->name_tm = $request->name_tm;
        $obj->name_ru = $request->name_ru ?: null;
        $obj->order = $request->order;

        $obj->name_en = $request->name_en ?: null;
        $obj->active = ($request->has('active')) ? true : false;
        if ($request->hasfile('image')) {
            if ($obj->img) {
                Storage::delete('public/service/image/' . $obj->img);
                Storage::delete('public/service/slider/' . $obj->img);
                Storage::delete('public/service/slider/placeholder/' . $obj->img);
                Storage::delete('public/service/thumbnail-big/' . $obj->img);
                Storage::delete('public/service/thumbnail-small/' . $obj->img);
                Storage::delete('public/service/admin/' . $obj->img);
            }
            $originalImage = $request->file('image');
            $originalImageName = $slug . Str::random(10) . 'image-.' . $originalImage->getClientOriginalExtension();
            $originalPath = 'public/service/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) {
                $constraint->aspectRatio();
            });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/service/slider/' . $originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/service/slider/placeholder/' . $originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/service/thumbnail-big/' . $originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/service/thumbnail-small/' . $originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/service/admin/' . $originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $obj->img = $originalImageName;
        }
        if ($request->hasfile('icon')) {
            if ($obj->icon) {
                Storage::delete('public/service/image/' . $obj->icon);
            }
            $originalImage = $request->file('icon');
            $originalImageName = $slug . Str::random(10) . '-icon.' . $originalImage->getClientOriginalExtension();
            $originalPath = 'public/service/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //

            $obj->icon = $originalImageName;
        }

        if ($request->hasfile('image_banner')) {

            if ($obj->image_banner) {
                Storage::delete('public/image_banner/image/' . $obj->img);
                Storage::delete('public/image_banner/slider/' . $obj->img);
                Storage::delete('public/image_banner/slider/placeholder/' . $obj->img);
                Storage::delete('public/image_banner/thumbnail-big/' . $obj->img);
                Storage::delete('public/image_banner/thumbnail-small/' . $obj->img);
                Storage::delete('public/image_banner/admin/' . $obj->img);
            }
            $originalImage = $request->file('image_banner');
            $originalImageName = $slug . Str::random(10) . '-image_banner.' . $originalImage->getClientOriginalExtension();
            $originalPath = 'public/image_banner/image/';
            $originalImage->storeAs($originalPath, $originalImageName);

            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) {
                $constraint->aspectRatio();
            });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/image_banner/slider/' . $originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/image_banner/slider/placeholder/' . $originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/image_banner/thumbnail-big/' . $originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/image_banner/thumbnail-small/' . $originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/image_banner/admin/' . $originalImageName;
            Storage::put($adminPath, $adminImage);

            $obj->image_banner = $originalImageName;
        }



        if ($request->hasfile('image_index')) {
            $newImage = $request->file('image_index');
            $newImageName = Str::random(10) . '-image_index.' . $newImage->getClientOriginalExtension();
            // resize image
            $image = Image::make($newImage);
            $image = (string) $image->encode('jpg', 80);
            $imagePath = 'public/image_index/' . $newImageName;
            Storage::put($imagePath, $image);
            // resize image
            $smallImage = Image::make($newImage)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $smallImage = (string) $smallImage->encode('jpg', 80);
            $smallImagePath = 'public/sm/image_index/' . $newImageName;
            Storage::put($smallImagePath, $smallImage);
            // model
            $obj->image_index = 'image_index/' . $newImageName;
        }

        $obj->update();

        $success = '<b>' . '</b> Surat düzedildi!';
        return redirect()->route('admin.service.index')->with([
            'success' => $success
        ]);
    }


    public function delete($id)
    {
        $obj = Service::findOrFail($id);
        if ($obj->img) {
            Storage::delete('public/service/image/' . $obj->img);
            Storage::delete('public/service/slider/' . $obj->img);
            Storage::delete('public/service/slider/placeholder/' . $obj->img);
            Storage::delete('public/service/thumbnail-big/' . $obj->img);
            Storage::delete('public/service/thumbnail-small/' . $obj->img);
            Storage::delete('public/service/admin/' . $obj->img);
        }
        $objName = $obj->slug;
        $obj->delete();
        $success = '<b>' . $objName . '</b> pozuldy!';
        return redirect()->route('admin.service.index')->with([
            'success' => $success
        ]);
    }

    public function activityIndex(Service $service)
    {
        $objs = Activity::where('service_id', $service->id)->orderBy('order')->paginate(10);
        return view('admin.service.activity.index')
            ->with([
                'objs' => $objs,
                'service' => $service,
            ]);
    }

    public function activityCreate(Service $service)
    {
        return view('admin.service.activity.create', compact('service'));
    }


    public function activityStore(Service $service, Request $request)
    {
        $request->validate([
            'title_tm' => 'required',
            'description_tm' => 'required',
        ]);

        $obj = new Activity();
        $obj->service_id = $service->id;
        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->description_tm = $request->description_tm;
        $obj->description_ru = $request->description_ru ?: null;
        $obj->description_en = $request->description_en ?: null;
        $obj->order = $request->order;

        $obj->save();

        $success = '<b>' . '</b> Goşuldy!';
        return redirect()->route('admin.service.activity.index', $service)->with([
            'success' => $success
        ]);
    }

    public function activityEdit(Service $service, Activity $activity)
    {
        $obj = $activity;
        return view('admin.service.activity.edit', compact('obj', 'service'));
    }


    public function activityUpdate(Request $request, Service $service, Activity $activity)
    {
        $obj = $activity;
        $request->validate([
            'title_tm' => 'required',
            'description_tm' => 'required',

        ]);

        $obj->title_tm = $request->title_tm;
        $obj->title_ru = $request->title_ru ?: null;
        $obj->title_en = $request->title_en ?: null;
        $obj->description_tm = $request->description_tm;
        $obj->description_ru = $request->description_ru ?: null;
        $obj->description_en = $request->description_en ?: null;
        $obj->order = $request->order;

        $obj->update();

        $success = '<b>' . '</b> Düzedildi!';
        return redirect()->route('admin.service.activity.index', $service)->with([
            'success' => $success
        ]);
    }


    public function activityDelete(Service $service, Activity $activity)
    {
        $obj = $activity;
        $obj->delete();
        $success = '<b>'  . '</b> pozuldy!';
        return redirect()->route('admin.service.activity.index', $service)->with([
            'success' => $success
        ]);
    }
}
