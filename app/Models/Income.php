<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';

    protected $fillable = [
        'product_id', 'store_id', 'sold', 'user_id'
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
