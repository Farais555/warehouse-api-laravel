<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table = 'productions';

    protected $fillable = [
        'product_id', 'quantity', 'production_date', 'description', 'onDuty'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
