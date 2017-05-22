<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = "barang";
    protected $primaryKey = "ID_Barang";
    public $timestamps = false;
    protected $fillable = array('Nama_Barang','Harga_Barang','Stok_Barang','Deskripsi_Barang');

}
