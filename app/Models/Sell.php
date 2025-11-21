<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $table = 'sells';

    protected $fillable = [
        'name', 'store', 'quantity', 'date_sell', 'onDuty'
    ];
}
