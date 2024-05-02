<?php

namespace App\Models;

use App\Models\City;
use App\Models\Governorate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded  = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

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

    public function account()
    {
        return $this->hasOne(AccountBalance::class , 'store_id');
    }
    public function rates()
    {
        return $this->hasMany(StoreRate::class , 'store_id');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class , 'store_id');
    }
}
