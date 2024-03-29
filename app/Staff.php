<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Staff extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'contact_no',
        'joined_at',
        'country',
        'store_id'
    ];

    protected $dates = ['deleted_at', 'joined_at'];

    protected $table = 'staff';

    public function deliveries() : HasMany    
    {
        return $this->hasMany(Order::class);
    }

    public function store()
    {   
        return $this->belongsTo(Store::class);
    }

    protected static function booted(){
        static::addGlobalScope('store', function(Builder $builder){
            $builder->where('store_id', Auth::user()->store_id );
        });

        static::creating(function ($query) {
            $query->store_id = Auth::user()->store_id;
        });

    }

    public function getJoinedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }

}
