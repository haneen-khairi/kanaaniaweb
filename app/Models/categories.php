<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
  protected $table = 'categories';
  protected $primaryKey = 'categoryid';
  public $timestamps = false;


    use HasFactory;
    public function products(){
       return $this->hasMany(products::class,'catid','categoryid');
   }
}
