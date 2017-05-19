<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class POBarang extends Model
{
  protected $table = "purchase_order_barang";
  protected $primaryKey = "ID_Quotation_Barang";
  public $timestamps = false;
  protected $fillable = array('Nama_Barang','Quantity','Harga_Satuan','ID_PO');

}
