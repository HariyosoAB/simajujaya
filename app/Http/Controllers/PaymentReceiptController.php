<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Barang;
use App\PR_Barang;
use App\PaymentReceipt;
use DB;
use Carbon\Carbon;
class PaymentReceiptController extends Controller
{
    public function showForm(){
      $data['client'] = Client::get();
      $data['barang'] = Barang::get();
      return view('pages.pr_form',$data);
    }
    public function insertPaymentReceipt(Request $request){
      $date = Carbon::now();
      $year = $date->year;
      $month = $date->month;
      //dd(sizeof($request->nama_barang));
      $date = $date->toDateString();
      $paymentreceipt = new PaymentReceipt;
      $id = DB::table('payment_receipt')->max('pr_id')+1;
      $paymentreceipt->pr_nomor = $id."/MajuJaya"."/"."PR"."/".$month."/".$year;

      if($request->id_perusahaan=="other"){
          $perusahaan = new Client;
          $perusahaan->client_nama = $request->nama_client;
          $perusahaan->client_alamat = $request->alamat_client;
          $perusahaan->client_telepon = $request->nomor_client;
          $perusahaan->save();
          $request->id_perusahaan = $perusahaan->client_id;
      }
      $paymentreceipt->ID_Client = $request->id_perusahaan;
      $paymentreceipt->pr_datetime = $date;
      $paymentreceipt->save();

      for($x = 0 ; $x<sizeof($request->id_barang) ; $x++)
      {
          $barang_pr = new PR_Barang;
          $barang_pr->ID_Barang = $request->id_barang[$x];
          $barang_pr->Jumlah = $request->jumlah_barang[$x];
          $barang_pr->ID_Payment_Receipt = $paymentreceipt->pr_id;
          $barang_pr->save();
      }
      $data['success'] = "berhasil membuat dokumen Payment Receipt";

      $data['info'] = DB::table("payment_receipt")
      ->join("client", "payment_receipt.ID_Client", "=", "client.client_id")
      ->where("payment_receipt.pr_id", "=", $paymentreceipt->pr_id)
      ->get();
      $data['barang'] = DB::table("payment_receipt_barang")->join("barang","payment_receipt_barang.ID_Barang","=","barang.ID_Barang")->where("payment_receipt_barang.ID_Payment_Receipt", "=", $paymentreceipt->pr_id)->get();
      return view('pages.pr_print',$data);


    }
}
