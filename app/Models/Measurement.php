<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;
    protected $fillable = [
        'meter_id',
        'measurement_period',
        'timestamp',
        'consumption_value',
        'location',
        
    ];

    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }

}
