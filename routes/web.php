<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dil/{key}', function ($key) {
    session()->put('locale', $key);
    return redirect()->back();
})->name('language');


// Authentication Routes...
Route::get('/bilermen-05', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/bilermen-05', 'Auth\LoginController@login');
Route::post('/bilermen-06', 'Auth\LoginController@logout')->name('logout');



Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');



    Route::get('/contact', 'ContactController@index')->name('contact.index');
    Route::get('/contact/{id}/edit', 'ContactController@edit')->name('contact.edit');
    Route::put('/contact/{id}', 'ContactController@update')->name('contact.update');

    Route::get('/districts', 'DistrictController@index')->name('districts.index');
    Route::get('/districts/{id}/edit', 'DistrictController@edit')->name('districts.edit');
    Route::put('/districts/{id}', 'DistrictController@update')->name('districts.update');

    Route::get('/users', 'UserController@index')->name('users.index');
    Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users', 'UserController@store')->name('users.store');
    Route::get('/users/{id}/edit', 'UserController@edit')->name('users.edit');
    Route::put('/users/{id}', 'UserController@update')->name('users.update');
    Route::delete('/users/{id}', 'UserController@delete')->name('users.delete');
    Route::get('/users/{id}/new-password', 'UserController@newPassword')->name('users.new-password');


    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/password', 'PasswordController@edit')->name('password.edit');
    Route::post('/password', 'PasswordController@update')->name('password.update');

    Route::get('/visitor-panel', 'VisitorPanelController@index')->name('visitor-panel');
    Route::get('/admin-panel', 'AdminPanelController@index')->name('admin-panel');


    Route::get('/ip-addresses', 'IpAddressController@index')->name('ip-addresses.index');
    Route::get('/ip-addresses/{id}/status', 'IpAddressController@status')->name('ip-addresses.status')->where(['id' => '[0-9]+']);
    Route::post('/ip-addresses/api', 'IpAddressController@api')->name('ip-addresses.api');


    Route::get('/user-agents', 'UserAgentController@index')->name('user-agents.index');
    Route::get('/user-agents/{id}/status', 'UserAgentController@status')->name('user-agents.status')->where(['id' => '[0-9]+']);
    Route::post('/user-agents/api', 'UserAgentController@api')->name('user-agents.api');


    Route::get('/visitors', 'VisitorController@index')->name('visitors.index');
    Route::post('/visitors/api', 'VisitorController@api')->name('visitors.api');


    Route::get('/login-attempts', 'LoginAttemptController@index')->name('login-attempts.index');
    Route::post('/login-attempts/api', 'LoginAttemptController@api')->name('login-attempts.api');
    Route::delete('/login-attempts', 'LoginAttemptController@delete')->name('login-attempts.delete');


    // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //
    // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // //

    Route::get('/sliders', 'SliderController@index')->name('sliders.index');
    Route::get('/sliders/create', 'SliderController@create')->name('sliders.create');
    Route::post('/sliders', 'SliderController@store')->name('sliders.store');
    Route::get('/sliders/{id}/edit', 'SliderController@edit')->name('sliders.edit')->where(['id' => '[0-9]+']);
    Route::put('/sliders/{id}', 'SliderController@update')->name('sliders.update')->where(['id' => '[0-9]+']);
    Route::delete('/sliders/{id}', 'SliderController@delete')->name('sliders.delete')->where(['id' => '[0-9]+']);

    Route::get('/contactBanner', 'ContactBannerController@index')->name('contactBanner.index');
    Route::get('/contactBanner/create', 'ContactBannerController@create')->name('contactBanner.create');
    Route::post('/contactBanner', 'ContactBannerController@store')->name('contactBanner.store');
    Route::get('/contactBanner/{id}/edit', 'ContactBannerController@edit')->name('contactBanner.edit');
    Route::put('/contactBanner/{id}', 'ContactBannerController@update')->name('contactBanner.update');
    Route::delete('/contactBanner/{id}', 'ContactBannerController@delete')->name('contactBanner.delete');








    Route::get('/shopBanner', 'ShopBannerController@index')->name('shopBanner.index');
    Route::get('/shopBanner/create', 'ShopBannerController@create')->name('shopBanner.create');
    Route::post('/shopBanner', 'ShopBannerController@store')->name('shopBanner.store');
    Route::get('/shopBanner/{id}/edit', 'ShopBannerController@edit')->name('shopBanner.edit');
    Route::put('/shopBanner/{id}', 'ShopBannerController@update')->name('shopBanner.update');
    Route::delete('/shopBanner/{id}', 'ShopBannerController@delete')->name('shopBanner.delete');

    Route::get('/customerBanner', 'PostBannerController@index')->name('postBanner.index');
    Route::get('/customerBanner/create', 'PostBannerController@create')->name('postBanner.create');
    Route::post('/customerBanner', 'PostBannerController@store')->name('postBanner.store');
    Route::get('/customerBanner/{id}/edit', 'PostBannerController@edit')->name('postBanner.edit');
    Route::put('/customerBanner/{id}', 'PostBannerController@update')->name('postBanner.update');
    Route::delete('/customerBanner/{id}', 'PostBannerController@delete')->name('postBanner.delete');

    Route::get('/posts', 'PostController@index')->name('post.index');
    Route::post('/post/api', 'PostController@api')->name('post.api');
    Route::get('/post/{id}/activate', 'PostController@activate')->name('post.activate');
    Route::get('/post/{id}/deactivate', 'PostController@deactivate')->name('post.deactivate');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/create', 'PostController@store')->name('post.store');
    Route::get('/post/{id}/edit', 'PostController@edit')->name('post.edit');
    Route::put('/post/{id}', 'PostController@update')->name('post.update');
    Route::get('/post/{id}/delete', 'PostController@delete')->name('post.delete');

    Route::get('/products', 'ProductController@index')->name('product.index');
    Route::post('/product/api', 'ProductController@api')->name('product.api');
    Route::get('/product/{id}/activate', 'ProductController@activate')->name('product.activate');
    Route::get('/product/{id}/deactivate', 'ProductController@deactivate')->name('product.deactivate');
    Route::get('/product/create', 'ProductController@create')->name('product.create');
    Route::post('/product/create', 'ProductController@store')->name('product.store');
    Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');
    Route::put('/product/{id}', 'ProductController@update')->name('product.update');
    Route::get('/product/{id}/delete', 'ProductController@delete')->name('product.delete');


    Route::get('/translation', 'TranslationController@index')->name('translations.index');
    Route::get('/translation/create', 'TranslationController@create')->name('translations.create');
    Route::post('/translation', 'TranslationController@store')->name('translations.store');
    Route::get('/translation/{id}/edit', 'TranslationController@edit')->name('translations.edit');
    Route::put('/translation/{id}', 'TranslationController@update')->name('translations.update');
    Route::delete('/translation/{id}', 'TranslationController@delete')->name('translations.delete');


    Route::get('/contactWith', 'ContactWithController@index')->name('contactWith.index');
    Route::get('/contactWith/{id}/edit', 'ContactWithController@edit')->name('contactWith.edit');
    Route::put('/contactWith/{id}', 'ContactWithController@update')->name('contactWith.update');


    Route::get('/service', 'ServiceController@index')->name('service.index');
    Route::get('/service/create', 'ServiceController@create')->name('service.create');
    Route::post('/service', 'ServiceController@store')->name('service.store');
    Route::get('/service/{id}/edit', 'ServiceController@edit')->name('service.edit');
    Route::put('/service/{id}', 'ServiceController@update')->name('service.update');
    Route::delete('/service/{id}', 'ServiceController@delete')->name('service.delete');
    Route::get('/service/{service}/activities', 'ServiceController@activityIndex')->name('service.activity.index');
    Route::get('/service/{service}/activities/create', 'ServiceController@activityCreate')->name('service.activity.create');
    Route::post('/service/{service}/activities', 'ServiceController@activityStore')->name('service.activity.store');
    Route::get('/service/{service}/activities/{activity}/edit', 'ServiceController@activityEdit')->name('service.activity.edit');
    Route::put('/service/{service}/activities/{activity}', 'ServiceController@activityUpdate')->name('service.activity.update');
    Route::delete('/service/{service}/activities/{activity}', 'ServiceController@activityDelete')->name('service.activity.delete');




    Route::get('/vacancy', 'VacancyController@index')->name('vacancy.index');
    Route::get('/vacancy/create', 'VacancyController@create')->name('vacancy.create');
    Route::post('/vacancy', 'VacancyController@store')->name('vacancy.store');
    Route::get('/vacancy/{id}/edit', 'VacancyController@edit')->name('vacancy.edit');
    Route::put('/vacancy/{id}', 'VacancyController@update')->name('vacancy.update');
    Route::delete('/vacancy/{id}', 'VacancyController@delete')->name('vacancy.delete');




    Route::get('/icon-cards', 'IconCardController@index')->name('iconCards.index');
    Route::get('/icon-cards/{id}/edit', 'IconCardController@edit')->name('iconCards.edit')->where(['id' => '[0-9]+']);
    Route::put('/icon-cards/{id}', 'IconCardController@update')->name('iconCards.update')->where(['id' => '[0-9]+']);



    Route::get('/serviceBanner', 'ServiceBannerController@index')->name('serviceBanner.index');
    Route::get('/serviceBanner/create', 'ServiceBannerController@create')->name('serviceBanner.create');
    Route::post('/serviceBanner', 'ServiceBannerController@store')->name('serviceBanner.store');
    Route::get('/serviceBanner/{id}/edit', 'ServiceBannerController@edit')->name('serviceBanner.edit');
    Route::put('/serviceBanner/{id}', 'ServiceBannerController@update')->name('serviceBanner.update');
    Route::delete('/serviceBanner/{id}', 'ServiceBannerController@delete')->name('serviceBanner.delete');

    Route::get('/categories', 'CategoryController@index')->name('category.index');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category', 'CategoryController@store')->name('category.store');
    Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::put('/category/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/category/{id}', 'CategoryController@delete')->name('category.delete');




    Route::get('/serviceAbout', 'ServiceAboutController@index')->name('serviceAbout.index');
    Route::get('/serviceAbout/create', 'ServiceAboutController@create')->name('serviceAbout.create');
    Route::post('/serviceAbout', 'ServiceAboutController@store')->name('serviceAbout.store');
    Route::get('/serviceAbout/{id}/edit', 'ServiceAboutController@edit')->name('serviceAbout.edit');
    Route::put('/serviceAbout/{id}', 'ServiceAboutController@update')->name('serviceAbout.update');
    Route::delete('/serviceAbout/{id}', 'ServiceAboutController@delete')->name('serviceAbout.delete');

    Route::get('/greets', 'GreetController@index')->name('greet.index');
    Route::get('/greet/create', 'GreetController@create')->name('greet.create');
    Route::post('/greet', 'GreetController@store')->name('greet.store');
    Route::get('/greet/{id}/edit', 'GreetController@edit')->name('greet.edit');
    Route::put('/greet/{id}', 'GreetController@update')->name('greet.update');
    Route::delete('/greet/{id}', 'GreetController@delete')->name('greet.delete');


    Route::get('/recommendation', 'RecommendationController@index')->name('recommendation.index');
    Route::get('/recommendation/create', 'RecommendationController@create')->name('recommendation.create');
    Route::post('/recommendation', 'RecommendationController@store')->name('recommendation.store');
    Route::get('/recommendation/{id}/edit', 'RecommendationController@edit')->name('recommendation.edit');
    Route::put('/recommendation/{id}', 'RecommendationController@update')->name('recommendation.update');
    Route::delete('/recommendation/{id}', 'RecommendationController@delete')->name('recommendation.delete');







    Route::get('/customers', 'CertificateController@index')->name('certificate.index');
    Route::get('/customers/create', 'CertificateController@create')->name('certificate.create');
    Route::post('/customers', 'CertificateController@store')->name('certificate.store');
    Route::get('/customers/{id}/edit', 'CertificateController@edit')->name('certificate.edit');
    Route::put('/customers/{id}', 'CertificateController@update')->name('certificate.update');
    Route::delete('/customers/{id}', 'CertificateController@delete')->name('certificate.delete');




    Route::get('/about', 'AboutController@index')->name('about.index');
    Route::get('/about/{id}/edit', 'AboutController@edit')->name('about.edit');
    Route::put('/about/{id}', 'AboutController@update')->name('about.update');

    Route::get('/why-choose-us', 'WhyChooseUsController@index')->name('why-choose-us.index');
    Route::get('/why-choose-us/{id}/edit', 'WhyChooseUsController@edit')->name('why-choose-us.edit');
    Route::put('/why-choose-us/{id}', 'WhyChooseUsController@update')->name('why-choose-us.update');

    Route::get('/tehnology', 'TehnologyController@index')->name('tehnology.index');
    Route::get('/tehnology/create', 'TehnologyController@create')->name('tehnology.create');
    Route::post('/tehnology', 'TehnologyController@store')->name('tehnology.store');
    Route::get('/tehnology/{id}/edit', 'TehnologyController@edit')->name('tehnology.edit');
    Route::put('/tehnology/{id}', 'TehnologyController@update')->name('tehnology.update');
    Route::delete('/tehnology/{id}', 'TehnologyController@delete')->name('tehnology.delete');

    Route::get('/aboutBanner', 'AboutBannerController@index')->name('aboutBanner.index');
    Route::get('/aboutBanner/create', 'AboutBannerController@create')->name('aboutBanner.create');
    Route::post('/aboutBanner', 'AboutBannerController@store')->name('aboutBanner.store');
    Route::get('/aboutBanner/{id}/edit', 'AboutBannerController@edit')->name('aboutBanner.edit');
    Route::put('/aboutBanner/{id}', 'AboutBannerController@update')->name('aboutBanner.update');
    Route::delete('/aboutBanner/{id}', 'AboutBannerController@delete')->name('aboutBanner.delete');
});



Route::group(['namespace' => 'Front'], function () {


    Route::get('/', 'DashboardController@index')->name('index');
    Route::get('/biz-barada', 'AboutController@index')->name('front.about.index');
    Route::get('/hyzmatlar', 'ServiceController@index')->name('front.service.index');
    Route::get('/hyzmat/{slug}', 'ServiceController@single')->name('front.service.service_single');
    Route::get('/habarlar', 'PostController@index')->name('front.post.index');
    Route::get('/habar/{slug}', 'PostController@single')->name('front.post.singleNews');
    Route::get('/mushderiler', 'CustomerController@index')->name('front.customers.index');

    Route::get('/habarlashmak', 'ContactController@index')->name('front.contact');
    Route::get('/harytlar', 'ProductController@index')->name('front.product.index');
    Route::get('/harytlar/{slug}', 'ProductController@show')->name('front.product.show');
    Route::get('/haryt/{slug}', 'ProductController@singleProduct')->name('front.product.singleProduct');
    Route::post('/sender', 'DashboardController@senderMail')->name('front.senderMail');
    Route::get('/syyahat', 'AboutController@travel')->name('front.about.travel');
    Route::get('/logistika', 'AboutController@logistics')->name('front.about.logistics');
    Route::get('/mahabat', 'AboutController@advertisement')->name('front.about.advertisement');
    Route::post('/sender','DashboardController@senderEmail')->name('front.senderEmail');

});
