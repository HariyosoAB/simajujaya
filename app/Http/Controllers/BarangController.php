<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function showForm(){

        $data['success'] = "";
        return view('pages.input_barang');
    }
    public function submitform(Request $request){
        $barang = new Barang;


        $barang->Nama_Barang = $request->nama_barang;
        $barang->Harga_Barang = $request->harga_barang;
        $barang->Stok_Barang = $request->stok_barang;
        $barang->Deskripsi_Barang = $request->deskripsi_barang;
        $barang->save();


        $data['success'] = "berhasil input data barang baru";
        return view('pages.input_barang',$data);

    }
    public function showTabel(){
        $data['barang']= Barang::get();
        return view('pages.tabel_barang',$data);
    }
    
}
