<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PR_Barang extends Model
{
  protected $table = "payment_receipt_barang";
  protected $primaryKey = "ID_PR_Barang";
  public $timestamps = false;
  protected $fillable = array('ID_Barang','ID_Payment_Receipt','Jumlah');

}
