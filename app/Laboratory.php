<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $guarded = ['id', 'date_order'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
