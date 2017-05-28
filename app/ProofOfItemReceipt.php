<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProofOfItemReceipt extends Model
{
  protected $table = "proof_of_item_receipt";
  protected $primaryKey = "poir_id";
  public $timestamps = false;
  protected $fillable = array('poir_datetime','poir_jenis','poir_nomor','po_id','pr_id');
}
