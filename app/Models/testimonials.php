<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonials extends Model
{
  protected $table = 'testimonials';
  protected $primaryKey = 'tsid';
  public $timestamps = false;


    use HasFactory;

}
