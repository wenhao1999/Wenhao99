<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarCharts extends Model
{
    use HasFactory;
    protected $fillable = [
        'month',
        'kWh',
        'totalamount'
    ];
}
