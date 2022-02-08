<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colors extends Model
{
  protected $table = 'colors';
  protected $primaryKey = 'colorid';
  public $timestamps = false;


    use HasFactory;
    public function products()
   {
       return $this->hasMany(products::class,'colorid','colorid');
   }
}
