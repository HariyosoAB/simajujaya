<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentReceipt extends Model
{
  protected $table = "payment_receipt";
  protected $primaryKey = "pr_id";
  public $timestamps = false;
  protected $fillable = array('pr_datetime','ID_Client','pr_nomor');

}
