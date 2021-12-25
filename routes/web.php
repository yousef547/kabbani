<?php

use Illuminate\Support\Facades\Auth;
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
 
    Route::get('/home','HomeController@index')->name('guest_home'); 

    Route::group(['namespace'=>'front'] ,(function () {
    //////////////////////// Begin Rate Routes ////////////////////////
    Route::group(['prefix'=>'rates'], (function(){
        Route::get('/create/{id}','RateController@create')->name('front.rate.create');
        Route::post('/store','RateController@store')->name('front.rate.store');
    }));
    //////////////////////// End Rate Routes ////////////////////////

    //////////////////////// Begin Customers Locations Routes ////////////////////////
    Route::group(['prefix'=>'customers_locations'], (function(){
        Route::get('/','Customer_LocationController@index')->name('admin.Customer_Locations');

        Route::get('/create','Customer_LocationController@create')->name('admin.Customer_Locations.create');
        Route::post('/store','Customer_LocationController@store')->name('admin.Customer_Locations.store');
        
        Route::get('/edit/{id}','Customer_LocationController@edit')->name('admin.Customer_Location.edit');
        Route::post('/update/{id}','Customer_LocationController@update')->name('admin.Customer_Location.update');

        Route::get('/delete/{id}','Customer_LocationController@destroy')->name('admin.Customer_Location.delete');

    }));
    //////////////////////// End Customers Locations Routes /////////////////////////

}));

    //////////////////////// Begin Login Routes ////////////////////////
    Route::get('/customers/all', 'AuthController@index')->name('customers.show');
    Route::get('/register', 'AuthController@register')->name('customer.register');
    Route::post('/handleRegister', 'AuthController@handleRegister')->name('customer.handleRegister');
    Route::get('/login', 'AuthController@getLogin')->name('customer.login');
    Route::post('/handleLogin', 'AuthController@handleLogin')->name('customer.handleLogin');    
    Route::get('/edit/{id}','AuthController@edit')->name('customer.edit');    
    Route::post('/update/{id}','AuthController@update')->name('customer.update');    
    Route::get('/logout', 'AuthController@logout')->name('customer.logout');
    //////////////////////// End Login Routes ////////////////////////

    //////////////////////// Begin Social Login Routes ////////////////////////
    // Sign Up Github
    Route::get('/login/github','AuthController@redirectToProvider')->name('auth.github.redirect');
    Route::get('/login/github/callback','AuthController@handleProviderCallback')->name('auth.github.callback');

    // Sign Up Google
    Route::get('/login/google','AuthController@redirectToProviderGoo')->name('auth.google.redirect');
    Route::get('/login/google/callback','AuthController@handleProviderCallbackGoo')->name('auth.google.callback');

    // Sign Up Facebook
    Route::get('/login/facebook','AuthController@redirectToProviderFace')->name('auth.facebook.redirect');
    Route::get('/login/facebook/callback','AuthController@handleProviderCallbackFace')->name('auth.facebook.callback');
    //////////////////////// End Social Login Routes ////////////////////////


    //////////////////////// Begin Guest Login Routes ////////////////////////
    Route::group(['prefix'=>'guest','namespace'=>'auth'], (function(){
        Route::get('/all', 'AuthController@index')->name('customers.show');
        // Route::get('/register', 'RegisterController@create')->name('customer.register');
        Route::post('/handleRegister', 'LoginController@handleRegister')->name('customer.handleRegister');
        Route::get('/login', 'AuthController@getLogin')->name('customer.login');
        Route::post('/handleLogin', 'AuthController@handleLogin')->name('customer.handleLogin');    
        Route::get('/edit/{id}','AuthController@edit')->name('customer.edit');    
        Route::post('/update/{id}','AuthController@update')->name('customer.update');    
        Route::get('/logout', 'AuthController@logout')->name('customer.logout');
    //////////////////////// End Guest Login Routes ////////////////////////
}));
// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
// Route::post('/register', 'auth\RegisterController@create')->name('guest.register');
// Route::post('/login', 'auth\LoginController@__construct')->name('guest.login');
        
