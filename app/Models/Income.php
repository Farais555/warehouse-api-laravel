<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'incomes';

    protected $fillable = [
        'product_id', 'store_id', 'sold', 'onDuty'
    ];
}
