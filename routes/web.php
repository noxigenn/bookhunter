<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
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

Route::get('/','App\Http\Controllers\Frontend\FrontendController@index');
Route::get('category','App\Http\Controllers\Frontend\FrontendController@category');
Route::get('view-category/{slug}','App\Http\Controllers\Frontend\FrontendController@viewcategory');
Route::get('category/{cate_slug}/{prod_slug}','App\Http\Controllers\Frontend\FrontendController@productview');



Auth::routes();
//CART //CART //CART //CART //CART //CART //CART //CART //CART //CART //CART //CART //CART 
//CART //CART //CART //CART //CART //CART 

/// ДОБАВИТ ЬВ КОРЗИНУ /// ДОБАВИТ ЬВ КОРЗИНУ /// ДОБАВИТ ЬВ КОРЗИНУ 
Route::post('add-to-cart',[CartController::class, 'addProduct']);
/// ДОБАВИТ ЬВ КОРЗИНУ /// ДОБАВИТ ЬВ КОРЗИНУ /// ДОБАВИТ ЬВ КОРЗИНУ 

//УДАЛИТЬ ИЗ КОРЗИНЫ//УДАЛИТЬ ИЗ КОРЗИНЫ//УДАЛИТЬ ИЗ КОРЗИНЫ
Route::post('delete-cart-item', [CartController::class, 'deleteproduct']);
    //УДАЛИТЬ ИЗ КОРЗИНЫ//УДАЛИТЬ ИЗ КОРЗИНЫ//УДАЛИТЬ ИЗ КОРЗИНЫ

Route::post('update-cart',[CartController::class, 'updatecart']);



///ПРОСМОТР КОРЗИНЫ ///ПРОСМОТР КОРЗИНЫ ///ПРОСМОТР КОРЗИНЫ ///ПРОСМОТР КОРЗИНЫ 
Route::middleware(['auth'])->group(function(){
  Route::get('checkout',[CheckoutController::class,'index' ] );


  Route::get('cart',[CartController::class, 'viewcart']);
  });
///ПРОСМОТР КОРЗИНЫ ///ПРОСМОТР КОРЗИНЫ ///ПРОСМОТР КОРЗИНЫ ///ПРОСМОТР КОРЗИНЫ 


  //CART //CART //CART //CART //CART //CART //CART //CART //CART \
  //CART //CART //CART //CART //CART //CART //CART //CART 
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Admin\FrontendController@index');

    /////КАТЕГОРИИ/////////    /////КАТЕГОРИИ/////////
    Route::get('categories', 'App\Http\Controllers\Admin\CategoryController@index');
    ///ДОБАВИТЬ
    Route::get('add-category', 'App\Http\Controllers\Admin\CategoryController@add');
    Route::post('insert-category', 'App\Http\Controllers\Admin\CategoryController@insert');
    ///ОБНОВИТЬ
    Route::get('edit-prod/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');
    Route::put('update-category/{id}', 'App\Http\Controllers\Admin\CategoryController@update');
    ///УДАЛИТЬ
    Route::get('delete-category/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy');


    ///ТОВАРЫ//////    ///ТОВАРЫ//////    ///ТОВАРЫ//////
    Route::get('products', 'App\Http\Controllers\Admin\ProductController@index');
    ///ДОБАВИТЬ
    Route::get('add-products', 'App\Http\Controllers\Admin\ProductController@add');
    Route::post('insert-product', 'App\Http\Controllers\Admin\ProductController@insert');
    ///ОБНОВИТЬ
    Route::get('edit-product/{id}', 'App\Http\Controllers\Admin\ProductController@edit');
    Route::put('update-product/{id}', 'App\Http\Controllers\Admin\ProductController@update');
    ///УДАЛИТЬ
    Route::get('delete-product/{id}','App\Http\Controllers\Admin\ProductController@destroy');
});
