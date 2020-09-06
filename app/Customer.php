<?php

namespace App;

use App\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'contact_no',
        'address_id',
        // 'order_id'
    ];

    public function address() : BelongsTo{
        return $this->belongsTo(Address::class);
    }

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class);
    }
}
