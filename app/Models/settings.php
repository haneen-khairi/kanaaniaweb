<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settings extends Model
{
  protected $table = 'settings';
  protected $primaryKey = 'st_id';
  public $timestamps = false;


  use HasFactory;


}
