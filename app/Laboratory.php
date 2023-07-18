<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $guarded = ['id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function scopeDate_order($query, $date_order)
    {
        if($date_order)
            return $query->where('date_order', 'LIKE', "%$date_order%");
    }
}
