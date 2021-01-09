<?php
/*
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Authorization, X-CSRF-Token, x-test-header, Origin, X-Requested-With, Content-Type, Accept' );
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
*/
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

Route::get('/', function () {
    return view('welcome');
});

//Proxy
Route::get('/proxy', 'AppProxyController@index')->middleware('auth.proxy');

//Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => ['web']], function(){
    Route::post('/webhook/shop-redact', 'ProductreviewsController@shopRedact');
    Route::post('/webhook/customers-redact', 'ProductreviewsController@customersRedact');
    Route::post('/webhook/customers-data-request', 'ProductreviewsController@customersDataRequest');
    //payment declined.
    Route::get(
        '/declined',
        'ProductreviewsController@declined'
    )
    ->name('declined');
    //Plan controller
    Route::get('plan', 'PlanController@index')->name('plan');
    
    //User Guide
    Route::get(
        '/userguide',
        'ProductreviewsController@userguide'
    )
    ->name('userguide');
    
    Route::post('/publishToTheme', 'ProductreviewsController@publishToTheme')->name('publishToTheme');
    Route::get('/publishToTheme', function(){
        abort(404,'Page not found');
    });

    //backend
    Route::get(
        '/',
        'ProductreviewsController@index'
    )
    ->middleware(['auth.shop', 'billable'])
    ->name('home');

    //Category
    Route::get('category', 'CategoryController@index')->name('category.index');
    Route::get('create', 'CategoryController@create')->name('category.create');
    Route::post('create', 'CategoryController@store');
    Route::get('update/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('update/{id}', 'CategoryController@update');
    Route::get('detail/{id}', 'CategoryController@detail')->name('category.detail');
    Route::get('delete/{id}', 'CategoryController@delete')->name('category.delete');


    //Product
    Route::group(['prefix'=>'product'],function (){
        Route::get('create', 'ProductController@create')->name('product.create');
        Route::post('create', 'ProductController@store');
        Route::get('index', 'ProductController@index')->name('product.index');
        Route::get('index/{type}', 'ProductController@type')->name('product.type');
        Route::get('detail/{id}', 'ProductController@detail')->name('product.detail');
        Route::get('delete/{id}', 'ProductController@delete')->name('product.delete');
        Route::get('update/{id}', 'ProductController@edit')->name('product.edit');
        Route::post('update/{id}', 'ProductController@update');
    });

    //Slider
    Route::group(['prefix'=>'sliders'],function (){
        Route::get('create', 'SliderController@create')->name('sliders.create');
        Route::post('create', 'SliderController@store');
        Route::get('index', 'SliderController@index')->name('sliders.index');
        Route::get('index/{type}', 'SliderController@type')->name('sliders.type');
        Route::get('detail/{id}', 'SliderController@detail')->name('sliders.detail');
        Route::get('delete/{id}', 'SliderController@delete')->name('sliders.delete');
        Route::get('update/{id}', 'SliderController@edit')->name('sliders.edit');
        Route::post('update/{id}', 'SliderController@update');
    });
    //Blogtest
    Route::group(['prefix'=>'blogtest'],function (){
        Route::get('create', 'BlogtestController@create')->name('blogtest.create');
        Route::post('create', 'BlogtestController@store');
        Route::get('index', 'BlogtestController@index')->name('blogtest.index');
        Route::get('index/{type}', 'BlogtestController@type')->name('blogtest.type');
        Route::get('detail/{id}', 'BlogtestController@detail')->name('blogtest.detail');
        Route::get('delete/{id}', 'BlogtestController@delete')->name('blogtest.delete');
        Route::get('update/{id}', 'BlogtestController@edit')->name('blogtest.edit');
        Route::post('update/{id}', 'BlogtestController@update');
    });

});
