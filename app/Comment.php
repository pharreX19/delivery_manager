<?php

namespace App;

use Carbon\Carbon;
use DateTimeZone;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'order_id'
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public static function boot(){
        parent::boot();
        // dd(Carbon::now(config('app.timezone'))->time);
        // dd(Carbon::getLocale(config('app.locale')->now()));
        // dd(Date('Y-m-d h:i:sa'));
        // dd(Carbon::now()->dumpLocale());
        static::creating(function($model){
            $model->created_at = Carbon::now();
        });
        
    }

    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y h:i a');
    }
}
