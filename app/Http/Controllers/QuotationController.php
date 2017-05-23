<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuotationBarang;
use App\Client;
use Carbon\Carbon;

class QuotationController extends Controller
{
    public function showForm(){
    	$data["perusahaan"] = Client::get();
    	return view('pages.quotation', $data);
    }

    public function formBarang(Request $request){
    	$date = Carbon::now();
    	$year = $date->year;
    	$month = $date->month;

    	$data['client_id'] = $request->client_id;
    	$data['jumlah'] = $request->input_jumlah;

    	return view('pages.quotation_barang', $data);
    }
}
