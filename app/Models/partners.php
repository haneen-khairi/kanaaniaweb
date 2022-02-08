<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partners extends Model
{
  protected $table = 'partners';
  protected $primaryKey = 'prid';
  public $timestamps = false;


    use HasFactory;

}
