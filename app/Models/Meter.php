<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
        'user_id',
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function measurements()
    {
        return $this->hasMany(Measurement::class);
    }


}