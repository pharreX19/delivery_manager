<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressCustomer extends Model
{
    protected $table = 'address_customers';

    protected $fillable = [
        'address_id',
        'customer_id',
        // 'order_id'
    ];

    public function order(){
        return $this->hasOne(Order::class);
    }

    public function address(){
        return $this->belongsTo(Address::class,);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    
}
