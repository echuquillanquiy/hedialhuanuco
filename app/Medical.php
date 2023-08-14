<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $fillable = [
    	'order_id',
        'patient',
        'room',
        'shift',
        'hour_hd',
        'heparin',
        'dry_weight',
        'start_weight',
        'uf',
        'qb',
        'qd',
        'bicarbonat',
        'cnd',
        'start_na',
        'end_na',
        'start_pa',
        'profile_na',
        'profile_uf',
        'area_filter',
        'membrane',
        'clinical_trouble',
        'fc',
        'evaluation',
        'end_evaluation',
        'indications',
        'start_hour',
        'end_hour',
        'signal',
        'user_id',
        'epo',
        'epo4000',
        'iron',
        'vitb12',
        'calci',
        'date_order',
        'fua_observacion',
        'so2',
        'fio',
        'temp'

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

    public function scopeDate_order($query, $date_order)
    {
        if($date_order)
            return $query->where('date_order', 'LIKE', "%$date_order%");
    }

    public function scopeCreated_at($query, $created_at)
    {
        if($created_at)
            return $query->where('created_at', 'LIKE', "%$created_at%");
    }

    public function scopeHour_hd($query, $hour_hd)
    {
        if($hour_hd)
            return $query->where('hour_hd', 'LIKE', "%$hour_hd%");
    }
}
