<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $table = "supplier";
  protected $primaryKey = "supplier_id";
  public $timestamps = false;
  protected $fillable = array('supplier_nama','supplier_alamat','supplier_telepon');

}
