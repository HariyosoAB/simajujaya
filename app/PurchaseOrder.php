<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    protected $table = "purchase_order";
    protected $primaryKey = "ID_Purchase_Order";
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = array('Nomor_Purchase_Order','Perusahaan_Tujuan','po_datetime');

}
