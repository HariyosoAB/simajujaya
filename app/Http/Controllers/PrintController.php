<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\POBarang;
use App\PurchaseOrder;
use App\Supplier;
use Carbon\Carbon;
use DB;

class PrintController extends Controller
{
  public function printData($id){
    $data['info'] = DB::table("purchase_order")
    ->join("supplier", "purchase_order.Perusahaan_Tujuan", "=", "supplier.supplier_id")
    ->where("purchase_order.ID_Purchase_Order", "=", $id)
    ->get();
    $data['barang'] = DB::table("purchase_order_barang")->where("purchase_order_barang.ID_PO", "=", $id)->get();
    return view('pages.printed',$data);
  }
}
