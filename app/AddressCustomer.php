<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressCustomer extends Model
{
    protected $table = 'address_customer';

    protected $fillable = [
        'address_id',
        'customer_id',
    ];
}
