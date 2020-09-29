<?php

namespace App;

use App\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'contact_no',
        // 'address_id',
        // 'order_id'
    ];

    public function address() : BelongsToMany
    {
        return $this->belongsToMany(Address::class, 'address_customers')->withPivot('id')->withTimestamps();

        // return $this->belongsToMany(Address::class)->withPivot('order_id')->as('orders')->withTimestamps();
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class,AddressCustomer::class);
    }

    // public function orders() : HasMany
    // {
        // return $this->hasMany(Order::class);
    // }
}
