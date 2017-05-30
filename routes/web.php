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
    if(Auth::check()){
      return view('pages.index');
    }
    else {
      return view('master.index');
    }
});

Route::get('/login', function() {
  return view('master.index');
});
Route::post('/login','authController@login');

Route::get('/logout', function () {
	  Auth::logout();
    return view('master.index');
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
Route::get('/quotation/barang', 'QuotationController@formBarang');
Route::get('/quotation/create', 'QuotationController@create');
Route::get('/quotation/print', 'QuotationController@cetak');

Route::get('/paymentreceipt', 'PaymentReceiptController@showForm');
Route::post('/paymentreceipt', 'PaymentReceiptController@insertPaymentReceipt');
Route::get('/printpr/{id}', 'PrintController@printPR');

Route::get('/proofitemreceipt', 'ProofOfItemReceiptController@showForm');
Route::post('/proofitemreceipt', 'ProofOfItemReceiptController@insertProofOfItem');
Route::get('/printpoirm/{id}', 'PrintController@printPOIRM');
Route::get('/printpoirk/{id}', 'PrintController@printPOIRK');


Route::get('/deliveryorder', 'DeliveryOrderController@showForm');
//Route::post('/deliveryorder', 'ProofOfItemReceiptController@insertProofOfItem');
//Route::get('/printdo/{id}', 'PrintController@printPOIC');



Route::get('/tabelbarang','BarangController@showTabel');
