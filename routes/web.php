<?php

use App\Jobs\Sample;
use App\Mail\Mail_send;
use Illuminate\Support\Facades\Mail;

Route::get('sample',function (){
    dispatch(new Sample('sample@gmail.com'));
        return new App\Mail\Mail_send();
});
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::prefix('/api')->group(function () {
    Route::get('/categories', 'Backend\CategoryController@apiindex');

});


Route::group(['middleware' =>['auth','verified','isAdmin']], function () {
    Route::prefix('/administrator')->group(function () {
        Route::get('/', 'Backend\MainController@main');
        Route::resource('categories', 'Backend\CategoryController');
        Route::get('/categories/{id}/settings', 'Backend\CategoryController@indexSetting')->name('categories.indexSetting');
        Route::post('/categories/{id}/settings', 'Backend\CategoryController@saveSetting');
        Route::resource('attribute_group', 'Backend\AttributeGroupController');
        Route::resource('attribute_value', 'Backend\AttributeValueController');
        Route::resource('brands', 'Backend\BrandController');
        Route::resource('photos', 'Backend\PhotoController');
        Route::post('photos/upload', 'Backend\PhotoController@upload')->name('photos.upload');
        Route::resource('products', 'Backend\ProductController');
        Route::resource('coupons', 'Backend\CouponController');
        Route::get('orders', 'Backend\OrderController@index')->name('order.list');
        Route::get('orderShow/{id}', 'Backend\OrderController@ordershow')->name('order.show');
        Route::resource('user_level', 'Backend\UserLevelController');
        Route::resource('slider','Backend\SliderController');
        Route::post('slider_img_del','Backend\SliderImgDelController@img_del')->name('slider.img.del');
    });
});


Route::resource('/', 'Frontend\HomeController');


//send verify email
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' =>[ 'auth','verified']], function () {
    Route::get('/profile', 'Frontend\UserRegisterController@profile')->name('user.profile');
    Route::get('/order_verify', 'Frontend\OrderController@verify')->name('order.verify');
    Route::get('/payment_verify/{id}', 'Frontend\PaymentController@verify')->name('payment.verify');
    Route::get('profile_orders', 'Frontend\OrderController@index')->name('profile.orders.list');
    Route::get('profileOrdersShow/{id}', 'Frontend\OrderController@showOrder')->name('profile.orders.show');
    Route::post('/CheckCode', 'Backend\CouponController@Check')->name('check.code');
});


//register
Route::post('UserRegister', 'Frontend\UserRegisterController@register')->name('UserRegister');
Route::post('findCity', 'Frontend\UserRegisterController@getCity');
Route::post('email_available', 'Frontend\UserRegisterController@emailAvailable');

//bascket
Route::get('/add_to_cart/{id}', 'Frontend\CartController@addToCart')->name('cart.add');
Route::post('/remove_item/{id}', 'Frontend\CartController@removeItem')->name('Cart.remove');
Route::get('/CartCheck', 'Frontend\CartController@GetAdd')->name('cart_check');

//show_product
Route::get('/product/{id}', 'Frontend\ProductSingleController@getProduct')->name('product.single');

//show_category
Route::get('/show_category/{id}', 'Frontend\ShowCategoryController@showCategory')->name('show_category');


//search
Route::post('search','Frontend\SearchController@SerachTitle')->name('search');

//showSearch
Route::get('showSearch/{id}','Frontend\SearchController@index')->name('showSearch');
Route::get('doSearch','Frontend\SearchController@doSearch')->name('doSearch');


Route::get('forgetPassword','Frontend\ForgetPasswordController@index')->name('forget_password');
