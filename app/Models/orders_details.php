<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_details extends Model
{
    protected $table = 'orders_details';
    protected $primaryKey = 'od_id';
    public $timestamps = false;
    use HasFactory;

}
