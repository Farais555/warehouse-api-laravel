<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouses';

    protected $fillable = [
        'product_id', 'stock', 'date'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
