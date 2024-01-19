<?php

namespace App\Http\Controllers\Front;

use App\Certificate;
use App\Contact;
use App\ContactWith;
use App\Greet;
use App\Http\Controllers\Controller;
use App\Service;
use App\ServiceAbout;
use App\ServiceBanner;
use App\Translation;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $contact = Contact::whereType('main')->first();
        $serviceBanner = ServiceBanner::where('active',1)->latest()->first();
        $services = Service::orderBy('order')->whereActive(true)->get();
        $serviceAbout = ServiceAbout::first();
        $contactWith = ContactWith::first();
        $greets = Greet::all();
        $partnersText = Translation::whereslug('partners_text')->first();
        $certificates = Certificate::whereActive(true)->whereType('it')->get();

        return view('front.service.index')->with([
            'contact' => $contact,
            'services' => $services,
            'contactWith' => $contactWith,
            'serviceBanner' => $serviceBanner,
            'serviceAbout' => $serviceAbout,
            'greets' => $greets,
            'certificates' => $certificates,

            'partnersText' => $partnersText,

        ]);
    }

    public function single($slug)
    {

        $service = Service::where('slug', $slug)
            ->whereActive(true)
            ->with('activities')
            ->firstOrFail();
        $activities = $service->activities;
        $half = $activities->count() / 2;
        $activitiesChunk = $activities->split(2);
        $contact = Contact::whereType('main')->first();
        $contactWith = ContactWith::first();
        $serviceBanner = ServiceBanner::where('active',1)->latest()->first();
        $services = Service::orderBy('id')->get();
        $serviceAbout = ServiceAbout::first();
        $greets = Greet::all();
        $partnersText = Translation::whereslug('partners_text')->first();
        $extras = ['Gündelik nahar', 'Ýol üpjünçiligi', 'GID', 'Suratçy', 'Terjimeçi'];

        return view('front.service.service_single')->with([
            'contact' => $contact,
            'service' => $service,
            'services' => $services,
            'contactWith' => $contactWith,
            'serviceBanner' => $serviceBanner,
            'serviceAbout' => $serviceAbout,
            'partnersText' => $partnersText,

            'greets' => $greets,
            'activitiesChunk' => $activitiesChunk,
            'extras' => $extras,


        ]);
    }
}
