<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sizes extends Model
{
  protected $table = 'sizes';
  protected $primaryKey = 'sizeid';
  public $timestamps = false;


  use HasFactory;

  public function products()
 {
     return $this->hasMany(products::class,'psizeid','sizeid');
 }

}
