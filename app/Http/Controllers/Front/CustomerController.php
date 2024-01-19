<?php

namespace App\Http\Controllers\Front;

use App\Certificate;
use App\Contact;
use App\ContactWith;
use App\Http\Controllers\Controller;
use App\PostBanner;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Certificate::whereActive(true)->get();
        $contact = Contact::whereType('main')->first();
        $contactWith = ContactWith::first();
        $customerBanner = PostBanner::where('active', 1)->latest()->first();


        return view('front.customers.index', compact('customers', 'customerBanner', 'contact', 'contactWith'));
    }
}
