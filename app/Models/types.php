<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class types extends Model
{
  protected $table = 'types';
  protected $primaryKey = 'typeid';
  public $timestamps = false;


  use HasFactory;

  public function products()
 {
     return $this->hasMany(products::class,'product_type','typeid');
 }
}
