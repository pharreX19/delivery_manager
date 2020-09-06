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

    public function customer() : HasMany{
        return $this->hasMany(Customer::class);
    }

    // public function orders() : HasMany
    // {
    //     return $this->hasMany(Order::class);
    // }
    
}
