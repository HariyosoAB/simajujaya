<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\POBarang;
use App\PurchaseOrder;
use App\Supplier;
use Carbon\Carbon;
use DB;
class PurchaseOrderController extends Controller
{
    public function showform(){
        $data['perusahaan'] = Supplier::get();
        return view('pages.purchase_order',$data);
    }

    public function insertPurchaseOrder(Request $request){
        $date = Carbon::now();
        $year = $date->year;
        $month = $date->month;
        //dd(sizeof($request->nama_barang));
        $date = $date->toDateString();
        $purchaseorder = new PurchaseOrder;
        $id = DB::table('purchase_order')->max('ID_Purchase_Order')+1;
        $purchaseorder->Nomor_Purchase_Order = $id."/MajuJaya"."/"."PO"."/".$month."/".$year;

        if($request->id_perusahaan=="other"){
            $perusahaan = new Supplier;
            $perusahaan->supplier_nama = $request->nama_supplier;
            $perusahaan->supplier_alamat = $request->alamat_supplier;
            $perusahaan->supplier_telepon = $request->nomor_supplier;
            $perusahaan->save();
            $request->id_perusahaan = $perusahaan->supplier_id;
        }
        $purchaseorder->Perusahaan_Tujuan = $request->id_perusahaan;
        $purchaseorder->po_datetime = $date;
        $purchaseorder->save();

        for($x = 0 ; $x<sizeof($request->nama_barang) ; $x++)
        {
            $barang_po = new POBarang;
            $barang_po->Nama_Barang = $request->nama_barang[$x];
            $barang_po->Quantity = $request->jumlah_barang[$x];
            $barang_po->Harga_Satuan = $request->harga_barang[$x];
            $barang_po->ID_PO = $purchaseorder->ID_Purchase_Order;

            $barang_po->save();
        }
        $data['success'] = "berhasil membuat dokumen purchase order";
        $data['info'] = DB::table("purchase_order")
        ->join("supplier", "purchase_order.Perusahaan_Tujuan", "=", "supplier.supplier_id")
        ->where("purchase_order.ID_Purchase_Order", "=", $purchaseorder->ID_Purchase_Order)
        ->get();
        $data['barang'] = DB::table("purchase_order_barang")->where("purchase_order_barang.ID_PO", "=", $purchaseorder->ID_Purchase_Order)->get();
        return view('pages.print_page',$data);
    }


}
