<?php

use App\Http\Middleware\Authenticate;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Route;

Route::get('/auth', 'AdminController@auth')->name('login');
Route::post('/auth', 'AdminController@auth')->name('login_page');

Route::get('/', 'PageController@index_page')->name('index_page');

Route::get('/catalog', 'ProductController@show_products_brands')->name('catalog');
Route::get('/catalog/{brand}', 'ProductController@show_products')->name('catalog.index');


Route::get('/product', 'ProductController@product_more')->name('product_more');
Route::post('/catalog/filter', 'ProductController@filter_by_brand')->name('filter_by_brand');
Route::get('/about_us', 'PageController@about_us_page')->name('about_us_page');
Route::get('/contacts', 'PageController@contacts_page')->name('contacts_page');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');

Route::post('/order', 'OrderController@store')->name('order.store');

Route::get('empty', function (){
    Cart::destroy();
});

Route::middleware([Authenticate::class])->group(function (){
    Route::get('/panel', 'OrderController@show')->name('panel_page');
    Route::get('/logout', 'AdminController@logout')->name('logout');

    //товары
    Route::get('panel/product', 'ProductController@create_product')->name('products');
    Route::post('panel/product', 'ProductController@create_product');
    Route::get('panel/product/edit_product', 'ProductController@edit_product')->name('edit_product');
    Route::post('panel/product/edit_product', 'ProductController@edit_product');
    Route::get('panel/product/delete_product', 'ProductController@delete_product')->name('delete_product');

    //марки
    Route::get('panel/brand', 'BrandController@create_brand')->name('brands');
    Route::post('panel/brand', 'BrandController@create_brand');
    Route::get('panel/brand/edit_brand', 'BrandController@edit_brand')->name('edit_brand');
    Route::post('panel/brand/edit_brand', 'BrandController@edit_brand');
    Route::get('panel/brand/delete_brand', 'BrandController@delete_brand')->name('delete_brand');

    //модели
    Route::get('panel/model', 'ModelController@create_model')->name('models');
    Route::post('panel/model', 'ModelController@create_model');
    Route::get('panel/model/edit_model', 'ModelController@edit_model')->name('edit_model');
    Route::post('panel/model/edit_model', 'ModelController@edit_model');
    Route::get('panel/model/delete_model', 'ModelController@delete_model')->name('delete_model');

    //категория
    Route::get('panel/category', 'CategoryController@create_category')->name('categories');
    Route::post('panel/category', 'CategoryController@create_category')->name('create_category');
    Route::get('panel/category/edit_category', 'CategoryController@edit_category')->name('edit_category');
    Route::post('panel/category/edit_category', 'CategoryController@edit_category');
    Route::get('panel/category/delete_category', 'CategoryController@delete_category')->name('delete_category');

    //заказы
    Route::get('panel/order', 'OrderController@show_order')->name('order.show');

});

Route::post('/feedback', 'MailController@send')->name('feedback');

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
