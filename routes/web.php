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
//Route::group(['middleware' => 'auth'], function () {
Route::group(['middleware' => ['web']], function () {
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
    Route::get('/publishToTheme', function () {
        abort(404, 'Page not found');
    });

    //backend
    Route::get(
        '/product-tab',
        'NavbarController@index'
    )
        ->middleware(['auth.shop', 'billable'])
        ->name('home');
    Route::get('setting', 'SettingsController@index')->name('setting.index');
    Route::get('setting/update', 'SettingsController@update')->name('setting.update');
    Route::get('setting-ajax-modal', 'SettingsController@ajax_modal')->name('setting.ajax_modal');
    Route::post('setting/store', 'SettingsController@store')->name('setting.store');
    Route::get('add-js', 'SettingsController@addScriptToTheme')->name('setting.add-script');
    Route::get('add-js1', 'SettingsController@addScriptToTheme1')->name('setting.add-script1');
    Route::get('add-css', 'SettingsController@addCssToTheme')->name('setting.add-script');

    Route::get('product-tab', 'NavbarController@index')->name('navbar.index');
    Route::get('product-tab-ajax-modal', 'NavbarController@ajax_modal')->name('navbar.ajax_modal');
    Route::post('product-tab/store', 'NavbarController@store')->name('navbar.store');
    Route::post('product-tab/edit/{id}', 'NavbarController@update')->name('navbar.update');
    Route::get('product-tab-ajax-edit-modal/{id}', 'NavbarController@ajax_edit_modal')->name('navbar.ajax_edit_modal');
    Route::get('product-tab/delete/{id}', 'NavbarController@delete')->name('navbar.delete');

    Route::get('product-tab/create','NavbarController@create')->name('create.navbar');
    Route::get('paginate-product-navbar-ajax', 'NavbarController@paginate_product_navbar_ajax')->name('paginate_product_navbar_ajax');
    Route::get('product-tab/edit/{id}','NavbarController@edit')->name('edit.navbar');
    Route::get('product-tab/show/{id}','NavbarController@show')->name('show.navbar');
    Route::get('addScriptNarbarToTheme','NavbarController@addScriptNarbarToTheme')->name('addScriptNarbarToTheme');
});
