<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    protected $fillable = [
        'name',
        'conatct_no',
        'address_id',
        'registartion_no'
    ];

    public function address() : BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function user()
    {   
        return $this->hasOne(User::class);
    }

    public function staff()
    {   
        return $this->hasMany(Staff::class);
    }

    public function items()
    {   
        return $this->hasMany(Item::class);
    }

    public function orders()
    {   
        return $this->hasMany(Order::class);
    }
    
    protected static function booted(){
        static::addGlobalScope('store', function(Builder $builder){
            $builder->where('id', Auth::user()->store_id );
        });
    }
    
    
}
