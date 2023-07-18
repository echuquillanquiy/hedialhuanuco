<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nephrology extends Model
{
    protected $guarded = ['id', 'date_order'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
