<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuotationBarang extends Model
{
    protected $table = "quotation_barang";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = array("quo_id", "jumlah", "barang_id");
}
