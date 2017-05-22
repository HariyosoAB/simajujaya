<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuotationBarang;
use App\Client;

class QuotationController extends Controller
{
    public function showForm(){
    	$data["perusahaan"] = Client::get();
    	return view('pages.quotation', $data);
    }
}
