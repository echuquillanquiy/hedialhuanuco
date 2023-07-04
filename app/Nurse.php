<?php

namespace App;

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
      'created_at',

      's',
      'o',
      'a',
      'p',

     'hr',
     'pa',
     'fc1',
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

     'hr6',
     'pa6',
     'fc6',
     'qb6',
     'cnd6',
     'ra6',
     'rv6',
     'ptm6',
      'sol_hemodev6',
     'obs6',

     'hr7',
     'pa7',
     'fc7',
     'qb7',
     'cnd7',
     'ra7',
     'rv7',
     'ptm7',
      'sol_hemodev7',
     'obs7',

      'hr8',
      'pa8',
      'fc8',
      'qb8',
      'cnd8',
      'ra8',
      'rv8',
      'ptm8',
      'sol_hemodev8',
      'obs8',
      'user_id'
];


     public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function scopeCreated_at($query, $created_at)
    {
        if($created_at)
            return $query->where('created_at', 'LIKE', "%$created_at%");
    }

}
