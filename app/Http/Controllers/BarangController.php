<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function showForm(){

        return view('pages.input_barang');
    }
}
