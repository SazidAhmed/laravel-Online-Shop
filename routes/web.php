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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/chat', function () {
    return view('chat');
});

Auth::routes();


Route::get('/dashboard', 'HomeController@index')->name('dashboard');

//Frontend Controllers
Route::get('/','FrontProductListController@index')->name('home');
Route::get('/product/{id}','FrontProductListController@view')->name('product.view');
Route::get('/category/{name}','FrontProductListController@allproduct')->name('product.list');
Route::get('/shop','FrontProductListController@moreProducts')->name('shop');

//Cart Controller
Route::get('/addToCart/{product}','CartController@addToCart')->name('add.cart');
Route::get('/cart','CartController@showCart')->name('cart.show');
Route::post('/products/{product}','CartController@updateCart')->name('cart.update');
Route::post('/product/{product}','CartController@removeCart')->name('cart.remove');
//checkout
Route::get('/checkout/{amount}','CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/charge','CartController@charge')->name('cart.charge');
//Order
Route::get('/orders','CartController@order')->name('order')->middleware('auth');



//admin panel Controller 
Route::group(['middleware'=>['auth','isAdmin']],function(){
        
        //admin panel Controller 
        Route::resource('users','UserController');
        Route::resource('dashboard','DashboardController');
        Route::resource('category','CategoryController');
        Route::resource('subcategory','SubcategoryController');
        Route::resource('product','ProductController');
        Route::resource('slider','SliderController');
        Route::get('subcatories/{id}','ProductController@loadSubCategories');

        //orders
        Route::get('allOrder','CartController@allOrder');

        Route::get('/userOrder/{userid}/{orderid}','CartController@viewUserOrder')->name('user.order');
    });
