<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Contact;
use App\ContactWith;
use App\Greet;
use App\Http\Controllers\Controller;
use App\Post;
use App\PostBanner;
use App\Product;
use App\Service;
use App\ShopBanner;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $productOrder = request()->tertip ?: 'default';

        $category = $request->category;

        $contact = Contact::whereType('main')->first();
        $contactWith = ContactWith::first();
        $categories = Category::orderBy('created_at', 'asc')->get();
        $products = Product::where('active', '=', 1)
            ->when($category, function ($q) use ($category) {
            $q->whereCategoryId($category);
        })->when(true, function ($query) use ($productOrder) {
                switch ($productOrder) {
                    case 'arzandan-gymmada':
                        $query->orderBy('price', 'asc');
                        break;
                    case 'gymmatdan-arzana':
                        $query->orderBy('price', 'desc');
                        break;
                    case 'tazeden-kona':
                        $query->orderBy('created_at', 'desc');
                        break;
                    case 'koneden-taza':
                        $query->orderBy('created_at', 'asc');
                        break;
//                    case 'in-kop-satylanlar':
//                        $query->orderBy('sold', 'desc');
//                        break;
                    default:
                        $query->orderBy('created_at', 'desc');
                }
//                $query->orderBy('amount', 'desc');
            })

        ->paginate(9);
        /*   $flags = Greet::all();*/
        $shopBanner = ShopBanner::where('active', 1)->latest()->first();
        return view('front.product.index')->with([
            'contact' => $contact,
            'contactWith' => $contactWith,
            'products' => $products,
            'categories' => $categories,
            'productOrder' => $productOrder,
            'shopBanner' => $shopBanner,

            /*'flags' => $flags,*/
        ]);
    }

    public function show($slug)
    {

        $contact = Contact::whereType('main')->first();
        $contactWith = ContactWith::first();
        $shopBanner = ShopBanner::where('active', 1)->latest()->first();
//        $posts = Post::orderByRaw('datetime desc')
//            ->where('active', '=', 1)->take(3)->get();
        $product = Product::whereSlug($slug)
            ->where('active', '=', 1)->firstOrFail();

        $products = Product::where('active', '=', 1)->get()->random(3);

        return view('front.product.show')->with([

            'contact' => $contact,
            'contactWith' => $contactWith,
            'product' => $product,
            'shopBanner' => $shopBanner,
            'products' => $products


        ]);
    }
}
