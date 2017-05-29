<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
use App\PaymentReceipt;
use App\ProofOfItemReceipt;
use Carbon\Carbon;
use DB;
class ProofOfItemReceiptController extends Controller
{
    public function showform(){
      $data['po'] = PurchaseOrder::get();
      $data['pr'] = PaymentReceipt::get();
      return view('pages.poic_form',$data);
    }
    public function insertProofOfItem(Request $request){
      $poir = new ProofOfItemReceipt;
      $date = Carbon::now();
      $year = $date->year;
      $month = $date->month;
      $date = $date->toDateString();
      $poir->poir_datetime = $date;
      $id = DB::table('proof_of_item_receipt')->max('poir_id')+1;
      $poir->poir_nomor=  $id."/MajuJaya"."/"."POIR"."/".$month."/".$year;
      if(isset($request->po)){
        $poir->poir_jenis = "2";
        $poir->po_id = $request->po;
      }
      else{
        $poir->poir_jenis = "1";
        $poir->pr_id = $request->pr;
      }
      $poir->save();

      if($poir->poir_jenis == "1"){
        $data['info'] = DB::table("proof_of_item_receipt")
        ->join("payment_receipt", "proof_of_item_receipt.pr_id", "=", "payment_receipt.pr_id")
        ->join("client", "payment_receipt.ID_Client", "=", "client.client_id")
        ->where("payment_receipt.pr_id", "=", $request->pr)
        ->get();
        $data['barang'] = DB::table("payment_receipt_barang")->join("barang","payment_receipt_barang.ID_Barang","=","barang.ID_Barang")->where("payment_receipt_barang.ID_Payment_Receipt", "=", $request->pr)->get();
        //dd($data);
      }
      else {
        $data['info'] = DB::table("proof_of_item_receipt")
        ->join("purchase_order", "proof_of_item_receipt.po_id", "=", "purchase_order.ID_Purchase_Order")
        ->join("supplier", "purchase_order.Perusahaan_Tujuan", "=", "supplier.supplier_id")
        ->where("purchase_order.ID_Purchase_Order", "=", $request->po)
        ->get();
        $data['barang'] = DB::table("purchase_order_barang")->where("purchase_order_barang.ID_PO", "=", $request->po)->get();
              //  dd($data);
      }
      $data['success'] = "berhasil membuat dokumen Proof of item receipt";
      return view('pages.poir_print',$data);

    }
}
