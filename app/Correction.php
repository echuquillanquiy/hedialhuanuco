<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        return $this->hasOne(Order::class)->withDefault();
    }
}
