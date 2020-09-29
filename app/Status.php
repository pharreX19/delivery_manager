<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'status'
    ];

    public function orders()
    {
        return $this->hasMany(OrderStatus::class);
    }

}
