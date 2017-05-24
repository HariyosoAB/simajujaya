<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
  protected $table = "quotation";
  protected $primaryKey = "quo_id";
  public $timestamps = false;
  protected $fillable = array('quo_nomor','quo_datetime','quo_deskripsi', 'quo_client');
}
