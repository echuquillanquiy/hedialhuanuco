<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
  protected $fillable = [
     'order_id',
     'patient',
     'room',
     'shift',
     'hcl',
     'frequency',
     'nhd',
     'others',
     'start_pa',
     'end_pa',
     'start_weight',
     'end_weight',
     'machine',
     'brand_model',
     'position',
     'filter',
     'uf',
     'access_arterial',
     'access_venoso',
     'iron',
     'epo2000',
     'epo4000',
     'hidroxi',
     'calcitriol',
     'others_med',
     'end_observation',
     'aspect_dializer',
      'date_order',


      's',
      'o',
      'a',
      'p',

     'hr',
     'pa',
     'fc',
     'qb',
     'cnd',
     'ra',
     'rv',
     'ptm',
      'sol_hemodev',
     'obs',

     'hr2',
     'pa2',
     'fc2',
     'qb2',
     'cnd2',
     'ra2',
     'rv2',
     'ptm2',
      'sol_hemodev2',
     'obs2',

     'hr3',
     'pa3',
     'fc3',
     'qb3',
     'cnd3',
     'ra3',
     'rv3',
     'ptm3',
      'sol_hemodev3',
     'obs3',

     'hr4',
     'pa4',
     'fc4',
     'qb4',
     'cnd4',
     'ra4',
     'rv4',
     'ptm4',
      'sol_hemodev4',
     'obs4',

     'hr5',
     'pa5',
     'fc5',
     'qb5',
     'cnd5',
     'ra5',
     'rv5',
     'ptm5',
      'sol_hemodev5',
     'obs5',

      'user_id',
      'user_id2',
      'enfermero_final',
      'estado'
];


     public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user2()
    {
        return $this->belongsTo(User::class, 'user_id2');
    }

    public function scopePatient($query, $patient)
    {
        if($patient)
            return $query->where('patient', 'LIKE', "%$patient%");
    }

    public function scopeRoom($query, $room)
    {
        if($room)
            return $query->where('room', 'LIKE', "%$room%");
    }

    public function scopeShift($query, $shift)
    {
        if($shift)
            return $query->where('shift', 'LIKE', "%$shift%");
    }

    public function scopeDate_order($query, $date_order)
    {
        if($date_order)
            return $query->where('date_order', 'LIKE', "%$date_order%");
    }
}
