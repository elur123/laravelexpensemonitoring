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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('suppliers', 'SupplierController');
    Route::resource('customers', 'CustomerController');
    Route::resource('transactions', 'TransactionController');
    Route::resource('clients', 'ClientController');
    Route::resource('products', 'ProductController');

    // Transaction Store Supplier
    Route::post('transactions-supplier', 'TransactionController@StoreSupplier')->name('transactions-supplier');
    Route::post('clients-customer', 'ClientController@StoreCustomer')->name('clients-customer');
});
