<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_types extends Model
{
  protected $table = 'home_types';
  protected $primaryKey = 'hcid';
  public $timestamps = false;

    use HasFactory;

}
