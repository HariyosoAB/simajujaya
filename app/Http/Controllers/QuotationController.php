<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QuotationBarang;
use App\Client;
use App\Quotation;

use Carbon\Carbon;
use DB;

class QuotationController extends Controller
{
    public function showForm(){
    	$data["perusahaan"] = Client::get();
    	return view('pages.quotation', $data);
    }

    public function formBarang(Request $request){
    	$date = Carbon::now();
    	$year = $date->year;
    	$month = $date->month;

    	$barang = DB::Table('barang')->orderBy('Nama_Barang', 'asc')->get();

    	$data['barang'] = $barang;

    	$data['client_id'] = $request->client_id;
    	$data['perusahaan'] = $request->perusahaan;
    	$data['alamat_perusahaan'] = $request->alamat_perusahaan;
    	$data['nomor_telepon'] = $request->nomor_telepon;
    	
    	$data['jumlah'] = $request->input_jumlah;

    	// dd($request->perusahaan);

    	// dd($request->client_id);

    	return view('pages.quotation_barang', $data);
    }

    public function create(Request $request){
    	$data["quo_id"] = array();
    	$data["quo_nomor"] = array();
    	$data["quo_datetime"] = array();

    	for($i = 0; $i<sizeof($request->client_id); $i++){
    		$date = Carbon::now();
	        $year = $date->year;
	        $month = $date->month;
	        $id = DB::table('quotation')->max('quo_id') + 1;

    		/*create new client*/
    		if($request->client_id[$i] == "other"){
    			$newClient = new Client;
    			$newClient->client_nama = $request->perusahaan[$i];
    			$newClient->client_alamat = $request->alamat_perusahaan[$i];
    			$newClient->client_telepon = $request->nomor_telepon[$i]; 
    			$newClient->save();

    			$result = DB::table('client')->select('client_id')->where('client_nama', $request->perusahaan[$i])->get();
    			$client_id = $result[0]->client_id;
    			// dd($client_id);
    		}
    		else{
    			$client_id = $request->client_id[$i];
    		}


    		/*create quotation*/
    		$newQuotation = new Quotation;
    		$newQuotation->quo_nomor = $id."/MajuJaya/Quotation/".$month."/".$year;
    		$newQuotation->quo_client = $client_id;
    		$newQuotation->quo_deskripsi = "";
    		$newQuotation->quo_datetime = Carbon::now();
    		$newQuotation->save();

    		$result = DB::table('quotation')->select('quo_id')->where('quo_nomor', $id."/MajuJaya/Quotation/".$month."/".$year)->get();
    		$quo_id = $result[0]->quo_id;

    		array_push($data["quo_id"], $quo_id);
    		array_push($data["quo_nomor"], $newQuotation->quo_nomor);
    		array_push($data["quo_datetime"], $newQuotation->quo_datetime);

    		for($j = 0; $j<sizeof($request->barang); $j = $j+1){
    			$newQuoBarang = new QuotationBarang;
    			$newQuoBarang->quo_id = $quo_id;
    			$newQuoBarang->barang_id = $request->barang[$j];
    			$newQuoBarang->jumlah = $request->jumlah[$j];
    			$newQuoBarang->save();
    		}
    	}


    	$data["test"] = "test";
    	return view('pages.quotation_create', $data);
    }

    public function cetak(Request $request){
    	$data["info"] = DB::table("quotation")->join("client", "quotation.quo_client", "=", "client.client_id")
    	->where("quotation.quo_id", $request->quo_id)->get();

    	$data["barang"] = DB::table("quotation_barang")
    	->join("barang", "quotation_barang.barang_id", "=", "barang.ID_Barang")
    	->where("quo_id", $request->quo_id)->get();
    	return view('pages.quotation_print', $data);
    }
}
