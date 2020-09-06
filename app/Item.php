<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'code',
        'description',
        'store_id'
    ];

    protected $dates = [
        'deleted_at'
    ];


    public function orders() : HasMany
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
    }

    public static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->store_id = Auth::user()->store_id;
        });
        
    }

}
