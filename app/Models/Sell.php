<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $table = 'sells';

    protected $fillable = [
        'product_id', 'store_id', 'quantity', 'date_sell', 'user_id'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
