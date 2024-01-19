<?php

namespace App\Http\Controllers\Front;

use App\About;
use App\Certificate;
use App\Recommendation;
use App\Tehnology;

use App\AboutBanner;
use App\Contact;
use App\ContactWith;
use App\District;
use App\Greet;
use App\Http\Controllers\Controller;
use App\IconCard;
use App\Translation;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $contact = Contact::whereType('main')->first();
        $contactWith = ContactWith::first();
        $greets = Greet::all();
        $about = About::whereType('about')->first();
        $aboutText = Translation::whereslug('about_contact_text')->first();
        $partnersText = Translation::whereslug('partners_text')->first();
        // $certificate_text = Translation::whereslug('certificate_text')->first();
        $contactText = Translation::whereslug('contact_us_text')->first();
        $aboutBanner = AboutBanner::where('active', 1)->whereType('about')->latest()->first();
        $counters = IconCard::whereType('counter')->get();
        $tehnologies = Tehnology::orderBy('id', 'asc')->get();
        $certificates = Certificate::whereActive(true)->whereType('about')->get();
        $recommendations = Recommendation::all();
        $districts = District::all();
        $projectName = Translation::whereslug('project_name')->first();


        return view('front.about.index')->with([
            'contact' => $contact,
            'aboutBanner' => $aboutBanner,
            'contactText' => $contactText,
            'projectName' => $projectName,
            'greets' => $greets,
            'tehnologies' => $tehnologies,
            'districts' => $districts,

            'about' => $about,
            'contactWith' => $contactWith,
            'aboutText' => $aboutText,
            'partnersText' => $partnersText,
            'counters' => $counters,
            'certificates' => $certificates,
            'recommendations' => $recommendations,
            // 'certificate_text' => $certificate_text
            /* 'flags' => $flags*/
        ]);
    }

    public function travel()
    {
        $contact = Contact::whereType('travel')->first();
        $contactWith = ContactWith::first();
        $greets = Greet::all();
        $about = About::whereType('travel')->first();
        $tehnologies = Tehnology::orderBy('id', 'asc')->get();
        $certificates = Certificate::whereActive(true)->whereType('travel')->get();

        $aboutText = Translation::whereslug('about_contact_text')->first();
        $partnersText = Translation::whereslug('partners_text')->first();
        $contactText = Translation::whereslug('contact_us_text')->first();
        $aboutBanner = AboutBanner::where('active', 1)->whereType('travel')->latest()->first();
        $counters = IconCard::whereType('counter')->get();
        return view('front.about.index')->with([
            'contact' => $contact,
            'aboutBanner' => $aboutBanner,
            'contactText' => $contactText,
            'greets' => $greets,
            'about' => $about,
            'tehnologies' => $tehnologies,
            'contactWith' => $contactWith,
            'aboutText' => $aboutText,
            'partnersText' => $partnersText,
            'counters' => $counters,
            'certificates' => $certificates,

            /* 'flags' => $flags*/
        ]);
    }
    public function logistics()
    {
        $contact = Contact::whereType('logistics')->first();
        $contactWith = ContactWith::first();
        $greets = Greet::all();
        $tehnologies = Tehnology::orderBy('id', 'asc')->get();
        $certificates = Certificate::whereActive(true)->whereType('logistics')->get();

        $about = About::whereType('logistics')->first();
        $aboutText = Translation::whereslug('about_contact_text')->first();
        $partnersText = Translation::whereslug('partners_text')->first();
        $contactText = Translation::whereslug('contact_us_text')->first();
        $aboutBanner = AboutBanner::where('active', 1)->whereType('logistics')->latest()->first();
        $counters = IconCard::whereType('counter')->get();
        return view('front.about.index')->with([
            'contact' => $contact,
            'aboutBanner' => $aboutBanner,
            'contactText' => $contactText,
            'greets' => $greets,
            'about' => $about,
            'contactWith' => $contactWith,
            'aboutText' => $aboutText,
            'tehnologies' => $tehnologies,
            'certificates' => $certificates,

            'partnersText' => $partnersText,
            'counters' => $counters
            /* 'flags' => $flags*/
        ]);
    }
    public function advertisement()
    {
        $contact = Contact::whereType('advertisement')->first();
        $contactWith = ContactWith::first();
        $greets = Greet::all();
        $tehnologies = Tehnology::orderBy('id', 'asc')->get();
        $certificates = Certificate::whereActive(true)->whereType('advertisement')->get();

        $about = About::whereType('advertisement')->first();
        $aboutText = Translation::whereslug('about_contact_text')->first();
        $partnersText = Translation::whereslug('partners_text')->first();
        $contactText = Translation::whereslug('contact_us_text')->first();
        $aboutBanner = AboutBanner::where('active', 1)->whereType('advertisement')->latest()->first();
        $counters = IconCard::whereType('counter')->get();
        return view('front.about.index')->with([
            'contact' => $contact,
            'aboutBanner' => $aboutBanner,
            'tehnologies' => $tehnologies,
            'certificates' => $certificates,

            'contactText' => $contactText,
            'greets' => $greets,
            'about' => $about,
            'contactWith' => $contactWith,
            'aboutText' => $aboutText,
            'partnersText' => $partnersText,
            'counters' => $counters
            /* 'flags' => $flags*/
        ]);
    }
}
