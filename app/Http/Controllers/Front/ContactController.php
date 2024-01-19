<?php

namespace App\Http\Controllers\Front;

use App\Contact;
use App\ContactBanner;
use App\District;
use App\Greet;
use App\Http\Controllers\Controller;
use App\Page;
use App\Service;
use Illuminate\Http\Request;
use App\Translation;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::whereType('main')->first();
        $contactText = Translation::whereslug('contact_us_text')->first();
        $contactBanner = ContactBanner::where('active', 1)->latest()->first();
        $districts = District::all();
        return view('front.contact.index')->with([
            'contact' => $contact,
            'contactBanner' => $contactBanner,
            'contactText' => $contactText,
            'districts' => $districts,

            /* 'flags' => $flags*/
        ]);
    }
}
