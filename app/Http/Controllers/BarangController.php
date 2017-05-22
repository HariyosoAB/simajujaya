<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Redirect;
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


        return Redirect::to('tabelbarang')->with('success','Berhasil input data barang baru');
    }
    public function showTabel(){
        $data['barang']= Barang::get();
        return view('pages.tabel_barang',$data);
    }
    public function showEditForm($id){
        $data['barang']= Barang::find($id);
        return view('pages.edit_barang',$data);
    }
    public function submiteditform(Request $request){
        $barang = Barang::find($request->id_barang);
    //dd($barang);
        $barang->Nama_Barang = $request->nama_barang;
        $barang->Harga_Barang = $request->harga_barang;
        $barang->Stok_Barang = $request->stok_barang;
        $barang->Deskripsi_Barang = $request->deskripsi_barang;
        $barang->save();


        return Redirect::to('tabelbarang')->with('success','Berhasil edit data barang');

    }
    public function submitdeleteform($request){
        $barang = Barang::find($request);
        $barang->delete();

        return Redirect::to('tabelbarang')->with('success','Berhasil hapus data barang');
    }
    
}
