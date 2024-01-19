<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index() {
        return view('admin.post.index');
    }

    public function create() {
        return view('admin.post.create');
    }


    public function store(Request $request) {
        $request->validate([
            'title_tm' => 'required|string|max:290',
            'title_ru' => 'nullable|string|max:290',
            'title_en' => 'nullable|string|max:290',
            'image' => 'mimes:jpeg,png,jpg,webp|max:2048|dimensions:width=770,height=410',
            'body_tm' => 'required',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
            'datetime' => 'required|date',
        ]);

        $post = new Post();
        $post->title_tm = $request->title_tm;
        $post->title_ru = $request->title_ru ?: null;
        $post->title_en = $request->title_en ?: null;

        $post->body_tm = $request->body_tm;
        $post->body_ru = $request->body_ru ?: null;
        $post->body_en = $request->body_en ?: null;
        $slug = str_slug($request->title_tm);
        $post->slug = $slug;
        $post->datetime = Carbon::parse($request['datetime'])->format('Y-m-d H:i:s');
        $post->active = ($request->has('active')) ? true : false;
        if ($request->hasfile('image'))
        {
            $originalImage = $request->file('image');
            $originalImageName = $slug.'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/post/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/post/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/post/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/post/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/post/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/post/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $post->img = $originalImageName;
        }
        $post->save();
        $success = '<b>'.$post->getTitle().'</b> goşuldy!';
        return redirect()->route('admin.post.index')->with([
            'success' => $success
        ]);
    }


    public function show($id) {
        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
    }


    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
    }


    public function update(Request $request, $id) {
        $post = Post::findOrFail($id);
        $request->validate([
            'title_tm' => 'required|string|max:190',
            'title_ru' => 'nullable|string|max:190',
            'title_en' => 'nullable|string|max:190',
            'image' => 'mimes:jpeg,png,jpg|max:2048|dimensions:width=770,height=410',
            'body_tm' => 'required',
            'body_ru' => 'nullable',
            'body_en' => 'nullable',
            'datetime' => 'required|date',
        ]);
        $post->title_tm = $request->title_tm;
        $post->title_ru = $request->title_ru ?: null;;
        $post->title_en = $request->title_en ?: null;;

        $post->body_tm = $request->body_tm;
        $post->body_ru = $request->body_ru ?: null;;
        $post->body_en = $request->body_en ?: null;;
        $slug = str_slug($request->title_tm);
        if ($request->title_tm != $post->title_tm) {
            $post->slug = $slug;
        }
        $post->datetime = Carbon::parse($request['datetime'])->format('Y-m-d H:i:s');
        $post->active = ($request->has('active')) ? true : false;
        if ($request->hasfile('image'))
        {
            if ($post->img) {
                Storage::delete('public/post/image/'.$post->img);
                Storage::delete('public/post/slider/'.$post->img);
                Storage::delete('public/post/slider/placeholder/'.$post->img);
                Storage::delete('public/post/thumbnail-big/'.$post->img);
                Storage::delete('public/post/thumbnail-small/'.$post->img);
                Storage::delete('public/post/admin/'.$post->img);
            }
            $originalImage = $request->file('image');
            $originalImageName = $slug.'.'.$originalImage->getClientOriginalExtension();
            $originalPath = 'public/post/image/';
            $originalImage->storeAs($originalPath, $originalImageName);
            //
            $sliderImage12 = Image::make($originalImage)->resize(null, 450, function ($constraint) { $constraint->aspectRatio(); });

            $sliderImage = $sliderImage12;
            $sliderImage = (string) $sliderImage->encode('jpg', 95);
            $sliderPath = 'public/post/slider/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);

            $sliderImage = $sliderImage12;
            $sliderImage->fill('#e5e5e5');
            $sliderImage = (string) $sliderImage->encode('jpg', 10);
            $sliderPath = 'public/post/slider/placeholder/'.$originalImageName;
            Storage::put($sliderPath, $sliderImage);
            //
            $thumbnailImageBig = Image::make($originalImage)->resize(450, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageBig = (string) $thumbnailImageBig->encode('jpg', 80);
            $thumbnailPathBig = 'public/post/thumbnail-big/'.$originalImageName;
            Storage::put($thumbnailPathBig, $thumbnailImageBig);
            //
            $thumbnailImageSmall = Image::make($originalImage)->resize(300, null, function ($constraint) { $constraint->aspectRatio(); });
            $thumbnailImageSmall = (string) $thumbnailImageSmall->encode('jpg', 80);
            $thumbnailPathSmall = 'public/post/thumbnail-small/'.$originalImageName;
            Storage::put($thumbnailPathSmall, $thumbnailImageSmall);
            //
            $adminImage = Image::make($originalImage)->resize(200, null, function ($constraint) { $constraint->aspectRatio(); });
            $adminImage = (string) $adminImage->encode('jpg', 80);
            $adminPath = 'public/post/admin/'.$originalImageName;
            Storage::put($adminPath, $adminImage);
            //
            $post->img = $originalImageName;
        }
        $post->update();

        $success = '<b>'.$post->getTitle().'</b> düzedildi!';
        return redirect()->route('admin.post.index')->with([
            'success' => $success
        ]);
    }


    public function delete($id)
    {
        $post = Post::findOrFail($id);
        if ($post->img) {
            Storage::delete('public/post/image/'.$post->img);
            Storage::delete('public/post/slider/'.$post->img);
            Storage::delete('public/post/slider/placeholder/'.$post->img);
            Storage::delete('public/post/thumbnail-big/'.$post->img);
            Storage::delete('public/post/thumbnail-small/'.$post->img);
            Storage::delete('public/post/admin/'.$post->img);
        }
        $post->delete();
        $success = 'pozuldy!';
        return redirect()->route('admin.post.index')->with([
            'success' => $success
        ]);
    }


    public function api(Request $request) {
        $columns = array(
            0 => 'id',
            1 => 'title_tm',
            2 => 'title_ru',
            3 => 'title_en',
            4 => 'datetime',
            5 => 'img',
            6 => 'active',
            7 => 'action',
        );

        $totalData = Post::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if (!$request->input('search.value')) {
            $posts = Post::offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Post::count();
        } else {
            $search = $request->input('search.value');
            $posts = Post::orWhere('id', 'ilike', "%{$search}%")
                ->orWhere('title_tm', 'ilike', "%{$search}%")
                ->orWhere('title_ru', 'ilike', "%{$search}%")
                ->orWhere('title_en', 'ilike', "%{$search}%")
                ->orWhere('datetime', 'ilike', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();

            $totalFiltered = Post::orWhere('id', 'ilike', "%{$search}%")
                ->orWhere('title_tm', 'ilike', "%{$search}%")
                ->orWhere('title_ru', 'ilike', "%{$search}%")
                ->orWhere('title_en', 'ilike', "%{$search}%")
                ->orWhere('datetime', 'ilike', "%{$search}%")
                ->count();
        }
        $data = array();
        if ($posts) {
            foreach ($posts as $r) {
                $nestedData['id'] = $r->id;
                $nestedData['title_tm'] = $r->title_tm;
                $nestedData['title_ru'] = $r->title_ru;
                $nestedData['title_en'] = $r->title_en;
                $nestedData['datetime'] = $r->datetime;
                $nestedData['img'] = $r->img != Null ? '<img src="'.request()->root().'/storage/post/admin/'.$r->img.'"/>' : 'Surat ýok';
                $nestedData['active'] = $r->active == 1 ? '
                <span class="badge badge-pill badge-success" style="font-size: 1rem;">Aktiw</span>
                ' : '
                <span class="badge badge-pill badge-danger" style="font-size: 1rem;">Deaktiw</span>
                ';
                $nestedData['action'] = '
                   
                    <a href="'.request()->root().'/admin/post/'.$r->id.'/edit" class="btn btn-outline-success btn-sm mb-2">
                        <i class="fa fa-pencil mr-1" aria-hidden="true"></i> Üýtget
                    </a>  &nbsp;
  <a href="'.request()->root().'/admin/post/'.$r->id.'/delete" class="btn btn-outline-success btn-sm mb-2">
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
