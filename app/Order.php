<?php

namespace App;

use App\Staff;
use App\Status;
use App\Customer;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    protected $fillable = [
        'item_id',
        'quantity',
        // 'customer_id',
        'staff_id',
        'status_id', 
        'store_id',
        'price',
        'address_customer_id'
    ];

    public function items() : BelongsToMany{
        return $this->belongsToMany(Item::class, 'item_orders')->withPivot(['quantity' , 'price'])->withTimestamps();
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

    public function orderAddress(){
        return $this->belongsTo(AddressCustomer::class, 'address_customer_id');
    }

    public function orderCustomer(){
        return $this->belongsTo(AddressCustomer::class, 'address_customer_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
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
            $model->status_id = 1;
        });  
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }

    public function getUpdatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }
}
