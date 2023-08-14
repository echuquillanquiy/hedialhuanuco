<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nephrology extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function scopeDate_order($query, $date_order)
    {
        if($date_order)
            return $query->where('date_order', 'LIKE', "%$date_order%");
    }
}
