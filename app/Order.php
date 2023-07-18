<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
	protected $fillable = [
		'patient_id',
        'room_id',
        'shift_id',
        'user_id',
        'covid',
        'n_fua',
        'date_order',
        'type',
        'lab'
	];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }


    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function medical()
    {
        return $this->hasOne(Medical::class)->withDefault();
    }

    public function nurse()
    {
        return $this->hasOne(Nurse::class)->withDefault();
    }

    public function laboratory()
    {
        return $this->hasOne(Laboratory::class)->withDefault();
    }

    public function nephrology()
    {
        return $this->hasOne(Nephrology::class)->withDefault();
    }

    public function recipe()
    {
        return $this->hasOne(Recipe::class)->withDefault();
    }

    /*public function scopePatient($query, $patient)
    {
        if($patient)
            return $query->where('patient_id', 'LIKE', "%$patient%");
    }*/

    public function scopeDate_order($query, $date_order)
    {
        if($date_order)
            return $query->where('date_order', 'LIKE', "%$date_order%");
    }

}
