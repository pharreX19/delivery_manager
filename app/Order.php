<?php

namespace App;

use App\Staff;
use App\Status;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Order extends Model
{
    protected $fillable = [
        'item_id',
        'quantity',
        'customer_id',
        'staff_id',
        'status_id', 
        'store_id'
    ];

    public function item() : BelongsTo{
        return $this->belongsTo(Item::class);
    }

    // public function address() : BelongsTo{
        // return $this->belongsTo(Address::class);
    // }

    public function assignee() : BelongsTo{
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function status() : BelongsTo{
        return $this->belongsTo(Status::class);
    }

    public function customer() : BelongsTo{
        return $this->belongsTo(Customer::class);
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
