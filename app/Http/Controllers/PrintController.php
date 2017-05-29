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
  public function printPR($id){
    $data['info'] = DB::table("payment_receipt")
    ->join("client", "payment_receipt.ID_Client", "=", "client.client_id")
    ->where("payment_receipt.pr_id", "=", $id)
    ->get();
    $data['barang'] = DB::table("payment_receipt_barang")->join("barang","payment_receipt_barang.ID_Barang","=","barang.ID_Barang")->where("payment_receipt_barang.ID_Payment_Receipt", "=", $id)->get();
    return view('pages.pr_printed',$data);
  }
  public function printPOIRM($id){
    $data['info'] = DB::table("proof_of_item_receipt")
    ->join("purchase_order", "proof_of_item_receipt.po_id", "=", "purchase_order.ID_Purchase_Order")
    ->join("supplier", "purchase_order.Perusahaan_Tujuan", "=", "supplier.supplier_id")
    ->where("purchase_order.ID_Purchase_Order", "=", $id)
    ->get();
    $data['barang'] = DB::table("purchase_order_barang")->where("purchase_order_barang.ID_PO", "=", $id)->get();
    return view('pages.poir_printed',$data);
  }
  public function printPOIRK($id){

    $data['info'] = DB::table("proof_of_item_receipt")
    ->join("payment_receipt", "proof_of_item_receipt.pr_id", "=", "payment_receipt.pr_id")
    ->join("client", "payment_receipt.ID_Client", "=", "client.client_id")
    ->where("payment_receipt.pr_id", "=", $id)
    ->get();
    $data['barang'] = DB::table("payment_receipt_barang")->join("barang","payment_receipt_barang.ID_Barang","=","barang.ID_Barang")->where("payment_receipt_barang.ID_Payment_Receipt", "=", $id)->get();
    return view('pages.poir_printed',$data);
  }
}
