<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mediator extends Model
{
    use HasFactory , SoftDeletes;
    protected $guarded = [];


    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class , 'mediator_id');
    }

}
