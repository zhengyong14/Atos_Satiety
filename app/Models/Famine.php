<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famine extends Model
{
    use HasFactory;

    protected $table = 'famines';
    protected $fillable = [
        'acquisition_timestamp',
        'area',
        'week',
        'NDVI_AGG',
        'NDWI_AGG',
        'MOIST_AGG',
        'overall_phase'
    ];


}
