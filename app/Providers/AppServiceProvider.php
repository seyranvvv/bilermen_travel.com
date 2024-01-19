<?php

namespace App\Providers;

use App\Contact;
use App\District;
use App\Service;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('front.app.header', function ($view) {
            $services = Service::orderBy('order')->get();
            $contact = Contact::first();
//            $contact = Contact::first();
            $view->with([
                'services' => $services,
                'contact' => $contact,
//                'contact' => $contact,/
            ]);
        });


        view()->composer('front.app.footer', function ($view) {
            $services = Service::orderBy('order')->get();
            $contact = Contact::first();
            $districts = District::all();
            $view->with([
                'services' => $services,
                'contact' => $contact,
                'districts' => $districts,
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if(app()->environment() == 'production') {
                    \URL::forceScheme('https');
        }

    }
}
