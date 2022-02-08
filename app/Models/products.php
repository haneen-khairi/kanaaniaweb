<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'productid';
    public $timestamps = false;


    use HasFactory;

    public function category()
    {
        return $this->belongsTo(categories::class, 'catid', 'categoryid');
    }

    public function size()
    {
        return $this->belongsTo(sizes::class, 'psizeid', 'sizeid');
    }

    public function type()
    {
        return $this->belongsTo(types::class, 'product_type', 'typeid');
    }

}
