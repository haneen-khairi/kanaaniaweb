<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
  protected $table = 'slider';
  protected $primaryKey = 'slid';
  public $timestamps = false;


    use HasFactory;

}
