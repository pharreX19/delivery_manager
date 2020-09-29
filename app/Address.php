<?php

namespace App;

use App\Order;
use App\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Address extends Model
{
    protected $fillable = [
        'island',
        'country',
        'building',
        'road',
        'block_no',
        'floor_no',
        'order_id'
    ];

    public function customer() : BelongsToMany{
        return $this->BelongsToMany(Customer::class, 'address_customers')->withPivot('id')->withTimestamps();
        // return $this->BelongsToMany(Customer::class)->withPivot('order_id')->as('orders')->withTimestamps();
    }

    public function orders() : HasManyThrough
    {
        return $this->hasManyThrough(Order::class, AddressCustomer::class);
    }

    // public function orders() : HasMany
    // {
    //     return $this->hasMany(Order::class);
    // }
    
}
