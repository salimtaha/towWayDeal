<?php

namespace App\Models;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Charity extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class , 'governorate_id');
    }
    public function city()
    {
        return $this->belongsTo(City::class , 'city_id');
    }
}
