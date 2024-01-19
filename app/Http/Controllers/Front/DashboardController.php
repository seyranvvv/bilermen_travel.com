<?php

namespace App\Http\Controllers\Front;

use App\About;
use App\ContactWith;
use App\Greet;
use App\Http\Controllers\Controller;
use App\IconCard;
use App\Post;
use App\Service;
use App\Slider;
use App\Translation;
use App\Vacancy;
use App\WhyChooseUs;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {



        $about = About::whereType('about')->first();
        $contact = Contact::whereType('main')->first();
        $counters = IconCard::whereType('counter')->get();
        $contactWith = ContactWith::first();
        $services = Service::orderBy('id')->whereActive(true)->get();
        $service_text_one = Translation::whereslug('index_service_one')->first();
        $service_text_two = Translation::whereslug('index_service_two')->first();
        // $index_post = Translation::whereslug('index_post')->first();
        $projectName = Translation::whereslug('project_name')->first();
        $icons = IconCard::whereType('index_icon')->get();
        $chooseIcons = IconCard::whereType('why-choose-us')->take(4)->get();
        $whyChooseUs = WhyChooseUs::first();
        $posts = Post::orderByRaw('datetime desc')
            ->where('datetime', '<=', Carbon::now())
            ->where('active', '=', 1)
            ->take(3)->get();
        $vacancies = Vacancy::orderBy('order')
            ->where('active', '=', 1)
            ->get();
        $sliders = Slider::whereStatus(1)
            ->orderBy('id', 'asc')
            ->take(5)
            ->get();
        $greets = Greet::all();
        $partnersText = Translation::whereslug('partners_text')->first();
        // $years_number = Translation::whereslug('years_number')->first();
        $years_text = Translation::whereslug('years_text')->first();
        return view('front.index')->with([
            'contact' => $contact,
            'contactWith' => $contactWith,
            'icons' => $icons,
            'about' => $about,
            'counters' => $counters,
            'services' => $services,
            'service_text_one' => $service_text_one,
            'whyChooseUs' => $whyChooseUs,
            'chooseIcons' => $chooseIcons,
            'service_text_two' => $service_text_two,
            'posts' => $posts,
            // 'index_post' => $index_post,
            'sliders' => $sliders,
            'greets' => $greets,
            'projectName' => $projectName,
            'partnersText' => $partnersText,
            'years_text' => $years_text,
            // 'years_number' => $years_number,
            'vacancies' => $vacancies,
        ]);
    }



    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('math')]);
    }


    public function senderEmail(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
            'captcha' => 'required|captcha'
        ]);



        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $subject = $request->subject;
        $message = $request->message;

        $data = array('name' => $name, 'email' => $email, 'phone' => $phone, 'subject' => $subject, 'message' => $message);


        //dd($data);
        $message =  Mail::send([], [], function ($messages) use ($data) {

            $name = $data['name'];
            $email = $data['email'];
            $phone = $data['phone'];
            $subject = $data['subject'];
            $message = $data['message'];
            $messages->to('kerimberdi99@gmail.com', 'Hat')->subject('Hat')->setBody(
                "                
                    <h2>$name</h2><br>
                    <h2>$email</h2><br>
                    <h2>$phone</h2><br>
                    <h2>$subject</h2><br>
                    <h2>$message</h2><br>
                   ",
                'text/html'
            );
        });

        dd($message);

        $success = trans('transFront.contact-success');

        return redirect()->route('index')
            ->with([
                'success' => $success,
            ]);
    }
}
