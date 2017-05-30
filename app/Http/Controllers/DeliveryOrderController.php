<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PaymentReceipt;
use App\DeliveryOrder;
use App\Client;
use App\Quotation;

use Carbon\Carbon;
use DB;

class DeliveryOrderController extends Controller
{
    public function showForm()
    {
        $data['pr'] = PaymentReceipt::get();
        return view('pages.do_form', $data);
    }

    public function insertDeliveryOrder(Request $request)
    {
        $doir = new DeliveryOrder;
        $date = Carbon::now();
        $year = $date->year;
        $month = $date->month;
        $date = $date->toDateString();
        $doir->do_datetime = $date;
        $id = DB::table('delivery_order')->max('do_id')+1;
        $doir->do_nomor=  $id."/MajuJaya"."/"."DO"."/".$month."/".$year;
        $doir->pr_id = $request->pr;
        $doir->save();
        $data['info'] = DB::table("delivery_order")
            ->join("payment_receipt", "delivery_order.pr_id", "=", "payment_receipt.pr_id")
            ->join("client", "payment_receipt.ID_Client", "=", "client.client_id")
            ->where("payment_receipt.pr_id", "=", $request->pr)
            ->get();
        $data['barang'] = DB::table("payment_receipt_barang")->join("barang","payment_receipt_barang.ID_Barang","=","barang.ID_Barang")->where("payment_receipt_barang.ID_Payment_Receipt", "=", $request->pr)->get();
        return view('pages.do_print',$data);
    }


}
