<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	protected $table = "patients";

    protected $fillable = [
    	'name', 'dni', 'date_of_birth', 'documento', 'age', 'acceso1', 'acceso2', 'civil_status', 'instruction', 'ocupation', 'condition', 'last_job', 'hosp_origin', 'code',
        'firstname', 'othername', 'surname', 'lastname', 'state'
    ];

    public function scopeName($query, $name)
    {
        if($name)
            return $query->where('name', 'LIKE', "%$name%");
    }

    public function scopeDni($query, $dni)
    {
        if($dni)
            return $query->where('dni', 'LIKE', "%$dni%");
    }

    public function scopeCode($query, $code)
    {
        if($code)
            return $query->where('code', 'LIKE', "%$code%");
    }

}
