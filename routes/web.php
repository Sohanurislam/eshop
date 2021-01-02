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

//get, post, put, patch, delete http verb

//frontend
Route::get('/', 'PublicController@index')->name('index');
Route::get('/category/{categoryId}', 'PublicController@index');
//Route::get('/category/{category}','PublicController@productsByCategoryId')->name('products_by_category');
Route::get('/products/{product}', 'PublicController@show')->name('product_details');


Route::get('/test-api', function () {

//    $user = [
//        'name'=>'Sohan',
//        'email'=>'Sohan@gmail.com',
//    ];
//    return $user;

    return 'testing api from web route';
});

    Auth::routes();

     Route::middleware(['auth', 'ageChecker'])->group(function (){

     Route::get('home', 'HomeController@index')->name('home');

         //carts
         Route::get('/cart/index', 'CartController@index')->name('carts');
         Route::post('/cart/store', 'CartController@store')->name('carts.store');
         Route::post('/cart/update/{id}', 'CartController@update')->name('carts.update');
         Route::delete('/cart/delete/{id}', 'CartController@destroy')->name('carts.destroy');


         //checkouts
         Route::get('/checkout/index', 'CheckoutController@index')->name('checkouts');
         Route::post('/checkout/store', 'CheckoutController@store')->name('checkouts.store');

         //frontend orders
         Route::get('/order/confirm', 'OrderController@orderconfirm')->name('orders.create');//create
         Route::post('/order/create', 'OrderController@shipping')->name('orders.shipping');//list
         Route::post('/order', 'OrderController@cart')->name('orders.cart');//store
         Route::get('/order/list', 'OrderController@show')->name('orders.show');//show
         //frontend user
         Route::get('/user/dashboard','UserController@dashboard')->name('user.dashboard');
         Route::get('/user/dashboard/profile','UserController@dashboardProfile')->name('user.profile');
         Route::post('/user/dashboard/update','UserController@updateProfile')->name('user.updateProfile');
         //user order list
         Route::get('/user/myOrder','OrderController@userOrder')->name('user.myOrder');


         Route::prefix('admin')->group(function () {

   //backend profile
    Route::get('/profile', 'UserController@profile')->name('users.profile');
    //review
    Route::post('/products/{product}/review', 'PublicController@review')->name('products.review');
    //notifications
    Route::get('/system/notifications','NotificationController@index')->name('notifications.all');

    //users route

    Route::get('/users', 'UserController@index')->name('users.index');//list
    Route::get('/users/create', 'UserController@create')->name('users.create');//create
    Route::post('/users', 'UserController@store')->name('users.store');//store
    Route::get('/users/{user}', 'UserController@show')->name('users.show');//show
    Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');//edit
    Route::put('/users/{user}/', 'UserController@update')->name('users.update');//update
    Route::delete('/users/{user}/', 'UserController@destroy')->name('users.destroy');//destroy

     //admin orders
    Route::get('/orders', 'OrderController@index')->name('orders.index');//list
    Route::get('/orders/{id}', 'OrderController@show')->name('orders.show');//show
    Route::post('/orders/completed/{id}', 'OrderController@completed')->name('orders.completed');//completed
    Route::post('/orders/paid/{id}', 'OrderController@paid')->name('orders.paid');//paid
//    Route::get('/orders/{order}/edit', 'OrderController@edit')->name('orders.edit');//edit
//    Route::put('/orders/{order}/', 'OrderController@update')->name('orders.update');//update
    Route::delete('/orders/{order}/', 'OrderController@destroy')->name('orders.destroy');//destroy


    Route::get('/users/download-pdf','UserController@downloadPdf')->name('users.download_pdf');
    Route::get('/users/download-excel','UserController@downloadExcel')->name('users.download_excel');
    Route::get('/users/trash','UserController@trash')->name('users.trash');
    Route::get('/users/{id}/restore','UserController@restore')->name('users.restore');
    Route::delete('/users/{id}/forceDelete','UserController@forcedelete')->name('users.forceDelete');

        /*Category routes*/

        Route::get('/categories/download-pdf','CategoryController@downloadPdf')->name('categories.download_pdf');
        Route::get('/categories/download-excel','CategoryController@downloadExcel')->name('categories.download_excel');
        Route::get('/categories/trash','CategoryController@trash')->name('categories.trash');
        Route::get('/categories/{id}/restore','CategoryController@restore')->name('categories.restore');
        Route::delete('/categories/{id}/forceDelete','CategoryController@forcedelete')->name('categories.forceDelete');
        Route::resource('/categories','CategoryController');


        Route::resource('/sizes','SizeController');
        Route::resource('/roles','RoleController');
        Route::resource('/postOffices', 'PostOfficeController');
        Route::resource('/permissions', 'PermissionController');

        /*Product routes*/

       Route::get('/products/download-pdf','ProductController@downloadPdf')->name('products.download_pdf');
       Route::get('/products/download-excel','ProductController@downloadExcel')->name('products.download_excel');
       Route::get('/products/trash','ProductController@trash')->name('products.trash');
       Route::get('/products/{id}/restore','ProductController@restore')->name('products.restore');
       Route::delete('/products/{id}/forceDelete','ProductController@forcedelete')->name('products.forceDelete');
        Route::resource('/products','ProductController');


    });

//Route::get('/home', function () {
//    return view('backend.home');
//});

});

//frontend cart
Route::get('/cart', 'CartController@shoppingCart')->name('cart');
Route::get('/cart{productId}', 'CartController@removeFromCart')->name('carts.remove_product');
Route::post('/add-to-cart', 'CartController@addToCart');
//         Route::post('/order', 'OrderController@placeOrder')->name('place_order');






