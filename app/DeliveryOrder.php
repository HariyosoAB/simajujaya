<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryOrder extends Model
{
  protected $table = "delivery_order";
  protected $primaryKey = "do_id";
  public $timestamps = false;
  protected $fillable = array('pr_id','do_nomor','do_datetime');

}
