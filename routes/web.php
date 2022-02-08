<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

use App\Http\Livewire\BootstrapTables;
use App\Http\Livewire\Components\Buttons;
use App\Http\Livewire\Components\Forms;
use App\Http\Livewire\Components\Modals;
use App\Http\Livewire\Components\Notifications;
use App\Http\Livewire\Components\Typography;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Err404;
use App\Http\Livewire\Err500;
use App\Http\Livewire\ResetPassword;
use App\Http\Livewire\ForgotPassword;
use App\Http\Livewire\Lock;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\ForgotPasswordExample;
use App\Http\Livewire\Index;
use App\Http\Livewire\LoginExample;
use App\Http\Livewire\ProfileExample;
use App\Http\Livewire\RegisterExample;
use App\Http\Livewire\Transactions;
use App\Http\Livewire\ResetPasswordExample;
use App\Http\Livewire\UpgradeToPro;
use App\Http\Livewire\Users;




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




Route::get('/blog', function () {
    return view('blog');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/checkout', function () {
    return view('checkout');
});


Route::get('/product', function () {
    return view('product');
});


Route::get('/{lang}/products','App\Http\Controllers\ProductsController@index');
Route::get('/{lang}/cart/addtocart','App\Http\Controllers\CartController@addToCart');
Route::get('/{lang}/products/{id}/{title}','App\Http\Controllers\ProductsController@productDetails');
Route::get('/{lang}/cart','App\Http\Controllers\CartController@index');
Route::get('/{lang}/cart/removeitem','App\Http\Controllers\CartController@removeItem');
Route::get('/{lang}/cart/updatecart','App\Http\Controllers\CartController@updateCart');
Route::get('/{lang}/cart/checkout','App\Http\Controllers\CartController@checkout');
Route::post('/{lang}/cart/pay','App\Http\Controllers\PaymentController@pay');
Route::get('/{lang}','App\Http\Controllers\HomeController@index')->name('home');
Route::get('/','App\Http\Controllers\HomeController@index')->name('home');
Route::get('/{lang}/about-us/','App\Http\Controllers\PagesController@about');
Route::get('/{lang}/contact-us','App\Http\Controllers\PagesController@contact');
Route::post('/{lang}/contact/send','App\Http\Controllers\PagesController@sendContact');
Route::get('/{lang}/founder','App\Http\Controllers\PagesController@founder');
Route::get('/{lang}/deliver','App\Http\Controllers\PagesController@delivery');
Route::get('/{lang}/term-condition','App\Http\Controllers\PagesController@terms');
Route::get('/{lang}/privacy','App\Http\Controllers\PagesController@privacy');
Route::get('/{lang}/subscribe','App\Http\Controllers\SubscribeController@indexUser');
Route::post('/{lang}/subscribe/save','App\Http\Controllers\SubscribeController@save');
//Route::get('/{lang}/products', [Products::class, 'index']);
Route::get('/{lang}/cart/success','App\Http\Controllers\PaymentController@success');


Route::get('{lang}/gold/price', 'App\Http\Livewire\Gold@getPrice');

Route::get('{lang}/login', Login::class)->name('login');

Route::get('/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('{lang}/reset-password/{id}', ResetPassword::class)->name('reset-password')->middleware('signed');

Route::get('{lang}/404', Err404::class)->name('404');
Route::get('{lang}/500', Err500::class)->name('500');

Route::middleware('auth')->group(function () {
    Route::get('{lang}/profile', Profile::class)->name('profile');
    Route::get('/profile-example', ProfileExample::class)->name('profile-example');
    Route::get('{lang}/users', Users::class)->name('users');
    Route::get('/login-example', LoginExample::class)->name('login-example');
    Route::get('/register-example', RegisterExample::class)->name('register-example');
    Route::get('/forgot-password-example', ForgotPasswordExample::class)->name('forgot-password-example');
    Route::get('/reset-password-example', ResetPasswordExample::class)->name('reset-password-example');
    Route::get('{lang}/dashboard', Dashboard::class)->name('dashboard');
    Route::get('{lang}/transactions', Transactions::class)->name('transactions');


    //Products
    Route::get('{lang}/dashboard/products', 'App\Http\Livewire\ProductsAdmin@index');
    Route::get('{lang}/product/new', 'App\Http\Livewire\ProductsAdmin@new');
    Route::get('{lang}/dashboard/products/{id}/delete', 'App\Http\Livewire\ProductsAdmin@delete');
    Route::post('{lang}/product/store', 'App\Http\Livewire\ProductsAdmin@store');
    Route::get('{lang}/product/makeimgdef', 'App\Http\Livewire\ProductsAdmin@makeimgdef');
    Route::get('{lang}/product/deleteimg', 'App\Http\Livewire\ProductsAdmin@deleteimg');
    Route::post('{lang}/product/uploadimgs', 'App\Http\Livewire\ProductsAdmin@uploadimgs');

    //Categories
    Route::get('{lang}/dashboard/categories', 'App\Http\Livewire\CategoriesAdmin@index');
    Route::get('{lang}/dashboard/categories/new', 'App\Http\Livewire\CategoriesAdmin@new');
    Route::post('{lang}/dashboard/categories/{id}/update', 'App\Http\Livewire\CategoriesAdmin@update');
    Route::get('{lang}/dashboard/categories/{id}/delete', 'App\Http\Livewire\CategoriesAdmin@delete');
    Route::get('{lang}/dashboard/categories/{id}/{title}', 'App\Http\Livewire\CategoriesAdmin@edit');
    Route::post('{lang}/dashboard/categories/store', 'App\Http\Livewire\CategoriesAdmin@store');

    //types
    Route::get('{lang}/dashboard/types', 'App\Http\Livewire\TypesAdmin@index');
    Route::get('{lang}/dashboard/types/new', 'App\Http\Livewire\TypesAdmin@new');
    Route::post('{lang}/dashboard/types/{id}/update', 'App\Http\Livewire\TypesAdmin@update');
    Route::get('{lang}/dashboard/types/{id}/delete', 'App\Http\Livewire\TypesAdmin@delete');
    Route::get('{lang}/dashboard/types/{id}/{title}', 'App\Http\Livewire\TypesAdmin@edit');
    Route::post('{lang}/dashboard/types/store', 'App\Http\Livewire\TypesAdmin@store');

    //sizes
    Route::get('{lang}/dashboard/sizes', 'App\Http\Livewire\SizesAdmin@index');
    Route::get('{lang}/dashboard/sizes/new', 'App\Http\Livewire\SizesAdmin@new');
    Route::post('{lang}/dashboard/sizes/{id}/update', 'App\Http\Livewire\SizesAdmin@update');
    Route::get('{lang}/dashboard/sizes/{id}/delete', 'App\Http\Livewire\SizesAdmin@delete');
    Route::get('{lang}/dashboard/sizes/{id}/{title}', 'App\Http\Livewire\SizesAdmin@edit');
    Route::post('{lang}/dashboard/sizes/store', 'App\Http\Livewire\SizesAdmin@store');

    //Testimonials
    Route::get('{lang}/dashboard/testimonials', 'App\Http\Livewire\TestimonialsAdmin@index')->name('testimonials');
    Route::get('{lang}/dashboard/testimonials/new', 'App\Http\Livewire\TestimonialsAdmin@new');
    Route::post('{lang}/dashboard/testimonials/{id}/update', 'App\Http\Livewire\TestimonialsAdmin@update');
    Route::get('{lang}/dashboard/testimonials/{id}/delete', 'App\Http\Livewire\TestimonialsAdmin@delete');
    Route::get('{lang}/dashboard/testimonials/{id}/{title}', 'App\Http\Livewire\TestimonialsAdmin@edit');
    Route::post('{lang}/dashboard/testimonials/store', 'App\Http\Livewire\TestimonialsAdmin@store');

    //Partners
    Route::get('{lang}/dashboard/partners', 'App\Http\Livewire\PartnersAdmin@index')->name('partners');
    Route::get('{lang}/dashboard/partners/new', 'App\Http\Livewire\PartnersAdmin@new');
    Route::post('{lang}/dashboard/partners/{id}/update', 'App\Http\Livewire\PartnersAdmin@update');
    Route::get('{lang}/dashboard/partners/{id}/delete', 'App\Http\Livewire\PartnersAdmin@delete');
    Route::get('{lang}/dashboard/partners/{id}/{title}', 'App\Http\Livewire\PartnersAdmin@edit');
    Route::post('{lang}/dashboard/partners/store', 'App\Http\Livewire\PartnersAdmin@store');

    //Home
    Route::get('{lang}/dashboard/home', 'App\Http\Livewire\HomeAdmin@index');
    Route::post('{lang}/dashboard/home/slider/update/{id}', 'App\Http\Livewire\HomeAdmin@updateSlide');
    Route::post('{lang}/dashboard/home/video/update/', 'App\Http\Livewire\HomeAdmin@updateVideo');

    //Home categories
    Route::get('{lang}/dashboard/home-types', 'App\Http\Livewire\HomeAdmin@types');
    Route::post('{lang}/dashboard/home/categories/update/{id}', 'App\Http\Livewire\HomeAdmin@updateType');


    //orders
    Route::get('{lang}/dashboard/orders', 'App\Http\Livewire\OrdersAdmin@index');
    Route::get('{lang}/dashboard/orders/{id}/{title}', 'App\Http\Livewire\OrdersAdmin@details');

    //subscribers
    Route::get('{lang}/dashboard/subscribers', 'App\Http\Livewire\SubscribersAdmin@index');

    //Route::get('{lang}/dashboard/sizes/new', 'App\Http\Livewire\SizesAdmin@new');
//    Route::post('{lang}/dashboard/sizes/{id}/update', 'App\Http\Livewire\SizesAdmin@update');
//    Route::get('{lang}/dashboard/sizes/{id}/delete', 'App\Http\Livewire\SizesAdmin@delete');
//    Route::get('{lang}/dashboard/sizes/{id}/{title}', 'App\Http\Livewire\SizesAdmin@edit');
//    Route::post('{lang}/dashboard/sizes/store', 'App\Http\Livewire\SizesAdmin@store');


//    Route::get('{lang}/dashboard/orders', 'App\Http\Livewire\ordersAdmin@index');
//    Route::get('{lang}/dashboard/orders/{id}/{title}', 'App\Http\Livewire\ordersAdmin@orderDetails');

    Route::get('{lang}/edit-product/{id}/{title}', 'App\Http\Livewire\ProductsAdmin@edit');


    Route::post('{lang}/product/{id}/update', 'App\Http\Livewire\ProductsAdmin@update');
    Route::get('{lang}/bootstrap-tables', BootstrapTables::class)->name('bootstrap-tables');
    Route::get('{lang}/lock', Lock::class)->name('lock');
    Route::get('{lang}/buttons', Buttons::class)->name('buttons');
    Route::get('{lang}/notifications', Notifications::class)->name('notifications');
    Route::get('{lang}/forms', Forms::class)->name('forms');
    Route::get('{lang}/modals', Modals::class)->name('modals');
    Route::get('{lang}/typography', Typography::class)->name('typography');
});
