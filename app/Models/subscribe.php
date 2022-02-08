<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribe extends Model
{
  protected $table = 'subscribe';
  protected $primaryKey = 'subscribeid';
  public $timestamps = false;


    use HasFactory;
}
