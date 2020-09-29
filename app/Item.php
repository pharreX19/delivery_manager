<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use SoftDeletes;
    const ITEM_DESCRIPTION = 'No Description for this item is found';

    protected $fillable = [
        'name',
        'code',
        'description',
        'store_id'
    ];

    protected $dates = [
        'deleted_at'
    ];

    protected $attributes = [
        'description' => SELF::ITEM_DESCRIPTION
    ];


    public function orders() : BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'item_orders');
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
