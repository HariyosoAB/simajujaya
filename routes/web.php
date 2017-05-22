<?php

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
    return view('pages.index');
});

Route::get('/login', function() {
	return('login page');
});

Route::get('/purchase', function () {
    return view('pages.print_page');
});

Route::get('/purchaseorder','PurchaseOrderController@showform');
Route::get('/addbarangform','BarangController@showform');
Route::get('/printpo/{id}','PrintController@printData');
Route::get('/updatebarangform/{id}','BarangController@showEditForm');
Route::post('/updatebarang','BarangController@submiteditform');
Route::get('/deletebarang/{id}','BarangController@submitdeleteform');
Route::post('/purchaseorder','PurchaseOrderController@insertPurchaseOrder');
Route::post('/inputbarang','BarangController@submitform');
Route::get('/quotation', 'QuotationController@showForm');
Route::get('/tabelbarang','BarangController@showTabel');