<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.product.index');
    }
    public function create() {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title_tm' => 'required|string|max:290',
            'title_ru' => 'nullable|string|max:290',
            'title_en' => 'nullable|string|max:290',
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=570,height=610',
            'main_img' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=270,height=320',
            'body_tm' => 'required',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
            'description_tm' => 'required',
            'description_ru' => 'nullable',
            'description_en' => 'nullable',
            'stars' => 'nullable|integer|max:5|min:1',
            'barcode' => 'nullable',
            'price' => 'nullable|numeric',
            'category_id' => 'required|integer',
        ]);

        $product = new Product();
        $product->title_tm = $request->title_tm;
        $product->title_ru = $request->title_ru ?: null;
        $product->title_en = $request->title_en ?: null;

        $product->body_tm = $request->body_tm;
        $product->body_ru = $request->body_ru ?: null;
        $product->body_en = $request->body_en ?: null;

        $product->description_tm = $request->description_tm;
        $product->description_ru = $request->description_ru ?: null;
        $product->description_en = $request->description_en ?: null;
        $product->barcode = $request->barcode ?: null;
        $product->stars = $request->stars ?: null;
        $product->price = $request->price ?: 100;
        $product->category_id = $request->category_id ?: 1;


        $slug = str_slug($request->title_tm);
        $product->slug = $slug;

        $product->active = ($request->has('active')) ? true : false;
        if ($request->hasfile('image'))
        {
            $originalImage = $request->file('image');
            $originalImageName = $slug.'-image.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/product/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/product/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/product/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/product/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/product/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/product/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $product->img = $originalImageName;
        }
        if ($request->hasfile('main_img'))
        {
            $originalImage = $request->file('main_img');
            $originalImageName = $slug.'-main_img.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/product/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/product/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/product/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/product/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/product/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/product/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $product->main_img = $originalImageName;
        }
        $product->save();
        $success = '<b>'.$product->getTitle().'</b> goşuldy!';
        return redirect()->route('admin.product.index')->with([
            'success' => $success
        ]);
    }


    public function show($id) {
        $product = Product::findOrFail($id);
        return view('admin.product.show', compact('product'));
    }


    public function edit($id) {
        $categories = Category::all();

        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product',  'categories'));
    }


    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);
        $request->validate([
            'title_tm' => 'required|string|max:290',
            'title_ru' => 'nullable|string|max:290',
            'title_en' => 'nullable|string|max:290',
            'image' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=570,height=610',
            'main_img' => 'nullable|mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=270,height=320',
            'body_tm' => 'required',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
            'description_tm' => 'required',
            'description_ru' => 'nullable',
            'description_en' => 'nullable',
            'stars' => 'nullable|integer|max:5|min:1',
            'barcode' => 'nullable',
            'price' => 'nullable|numeric',
            'category_id' => 'required|integer',

        ]);
        $product->title_tm = $request->title_tm;
        $product->title_ru = $request->title_ru ?: null;;
        $product->title_en = $request->title_en ?: null;;

        $product->body_tm = $request->body_tm;
        $product->body_ru = $request->body_ru ?: null;;
        $product->body_en = $request->body_en ?: null;;

        $product->description_tm = $request->description_tm;
        $product->description_ru = $request->description_ru ?: null;
        $product->description_en = $request->description_en ?: null;
        $product->category_id = $request->category_id ?: null;
        $product->barcode = $request->barcode ?: null;
        $product->price = $request->price ?: 100;
        $product->stars = $request->stars ?: null;
        $slug = str_slug($request->title_tm);
        if ($request->title_tm != $product->title_tm) {
            $product->slug = $slug;
        }
        $product->active = ($request->has('active')) ? true : false;




//        if ($request->hasfile('image'))
//        {
//
//            $originalImage = $request->file('main_img');
//            $originalImageName = $slug.'main_img.'.$originalImage->getClientOriginalExtension();
//            $originalPath = 'public/product/image/';
//            $originalImage->storeAs($originalPath, $originalImageName);
//            //
//            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });
//
//            $sliderImage = $sliderImage12;
//            $sliderImage = (string) $sliderImage->encode('jpg', 95);
//            $sliderPath = 'public/product/slider/'.$originalImageName;
//            Storage::put($sliderPath, $sliderImage);
//
//            $sliderImage = $sliderImage12;
//            $sliderImage->fill('#e5e5e5');
//            $sliderImage = (string) $sliderImage->encode('jpg', 10);
//            $sliderPath = 'public/product/slider/placeholder/'.$originalImageName;
//            Storage::put($sliderPath, $sliderImage);
//            //
//            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
//            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
//            $thumbnailPathBig = 'public/product/thumbnail-big/'.$originalImageName;
//            Storage::put($thumbnailPathBig, $thumbnailImageBig);
//            //
//            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
//            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
//            $thumbnailPathSmall = 'public/product/thumbnail-small/'.$originalImageName;
//            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
//            //
//            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
//            $adminImage = (string) $adminImage->encode('jpg', 80);
//            $adminPath = 'public/product/admin/'.$originalImageName;
//            Storage::put($adminPath, $adminImage);
//            //
//            $product->main_img = $originalImageName;
//        }


        if ($request->hasfile('image'))
        {
            if ($product->img) {
                Storage::delete('public/product/image/'.$product->img);
                Storage::delete('public/product/slider/'.$product->img);
                Storage::delete('public/product/slider/placeholder/'.$product->img);
                Storage::delete('public/product/thumbnail-big/'.$product->img);
                Storage::delete('public/product/thumbnail-small/'.$product->img);
                Storage::delete('public/product/admin/'.$product->img);
            }
            $originalImage = $request->file('image');
            $originalImageName = $slug.'-image.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/product/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/product/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/product/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/product/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/product/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/product/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $product->img = $originalImageName;
        }




        if ($request->hasfile('main_img'))
        {

            if ($product->main_img) {
                Storage::delete('public/product/image/'.$product->main_img);
                Storage::delete('public/product/slider/'.$product->main_img);
                Storage::delete('public/product/slider/placeholder/'.$product->main_img);
                Storage::delete('public/product/thumbnail-big/'.$product->main_img);
                Storage::delete('public/product/thumbnail-small/'.$product->main_img);
                Storage::delete('public/product/admin/'.$product->main_img);
            }
            $originalImage = $request->file('main_img');
            $originalImageName = $slug.'-main_img.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/product/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/product/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/product/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/product/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/product/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/product/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $product->main_img = $originalImageName;
        }



        $product->update();

        $success = '<b>'.$product->getTitle().'</b> düzedildi!';
        return redirect()->route('admin.product.index')->with([
            'success' => $success
        ]);
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        if ($product->img) {
            Storage::delete('public/product/image/'.$product->img);
            Storage::delete('public/product/slider/'.$product->img);
            Storage::delete('public/product/slider/placeholder/'.$product->img);
            Storage::delete('public/product/thumbnail-big/'.$product->img);
            Storage::delete('public/product/thumbnail-small/'.$product->img);
            Storage::delete('public/product/admin/'.$product->img);
        }

        if ($product->main_img) {
            Storage::delete('public/product/image/'.$product->main_img);
            Storage::delete('public/product/slider/'.$product->main_img);
            Storage::delete('public/product/slider/placeholder/'.$product->main_img);
            Storage::delete('public/product/thumbnail-big/'.$product->main_img);
            Storage::delete('public/product/thumbnail-small/'.$product->main_img);
            Storage::delete('public/product/admin/'.$product->main_img);
        }
        $product->delete();
        $success = 'pozuldy!';
        return redirect()->route('admin.product.index')->with([
            'success' => $success
        ]);
    }


    public function api(Request $request) {
        $columns = array(
            0 => 'id',
            1 => 'title_tm',
            2 => 'title_ru',
            3 => 'title_en',
            4 => 'barcode',
            5 => 'img',
            6 => 'active',
            7 => 'action',
        );

        $totalData = Product::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (!$request->input('search.value')) {
            $posts = Product::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Product::count();
        } else {
            $search = $request->input('search.value');
            $posts = Product::orWhere('id', 'ilike', "%{$search}%")
                ->orWhere('title_tm', 'ilike', "%{$search}%")
                ->orWhere('title_ru', 'ilike', "%{$search}%")
                ->orWhere('title_en', 'ilike', "%{$search}%")
                ->orWhere('barcode', 'ilike', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Product::orWhere('id', 'ilike', "%{$search}%")
                ->orWhere('title_tm', 'ilike', "%{$search}%")
                ->orWhere('title_ru', 'ilike', "%{$search}%")
                ->orWhere('title_en', 'ilike', "%{$search}%")
                ->orWhere('barcode', 'ilike', "%{$search}%")
                ->count();
        }
        $data = array();
        if ($posts) {
            foreach ($posts as $r) {
                $nestedData['id'] = $r->id;
                $nestedData['title_tm'] = $r->title_tm;
                $nestedData['title_ru'] = $r->title_ru;
                $nestedData['title_en'] = $r->title_en;
                $nestedData['barcode'] = $r->barcode;
                $nestedData['img'] = $r->img != Null ? '<img src="'.request()->root().'/storage/product/admin/'.$r->img.'"/>' : 'Surat ýok';
                $nestedData['active'] = $r->active == 1 ? '
                <span class="badge badge-pill badge-success" style="font-size: 1rem;">Aktiw</span>
                ' : '
                <span class="badge badge-pill badge-danger" style="font-size: 1rem;">Deaktiw</span>
                ';
                $nestedData['action'] = '

                    <a href="'.request()->root().'/admin/product/'.$r->id.'/edit" class="btn btn-outline-success btn-sm mb-2">
                        <i class="fa fa-pencil mr-1" aria-hidden="true"></i> Üýtget
                    </a>  &nbsp;
  <a href="'.request()->root().'/admin/product/'.$r->id.'/delete" class="btn btn-outline-success btn-sm mb-2">
                        <i class="fa fa-pencil mr-1" aria-hidden="true"></i> Poz
                    </a>
				';
                $data[] = $nestedData;
            }
        }

        $json_data = array(
            "draw" => intval($request->input('draw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data
        );

        echo json_encode($json_data);
    }
}
