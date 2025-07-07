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
        'lab',
    ];

    // Relaciones
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

    // Query Scope para filtrar por fecha
    public function scopeDate_order($query, $date_order)
    {
        // Usar whereDate para una coincidencia exacta de fecha (columna DATE)
        if ($date_order) {
            return $query->whereDate('date_order', $date_order);
        }
        return $query; // Es importante retornar el query si no se aplica el filtro
    }

    // Nuevo Query Scope para filtrar por nombre/apellido del paciente
    public function scopePatientName($query, $patientName)
    {
        if ($patientName) {
            // Unir con la tabla de pacientes y buscar en sus campos de nombre/apellido
            return $query->whereHas('patient', function ($q) use ($patientName) {
                $q->where('firstname', 'LIKE', "%{$patientName}%")
                  ->orWhere('othername', 'LIKE', "%{$patientName}%")
                  ->orWhere('surname', 'LIKE', "%{$patientName}%")
                  ->orWhere('lastname', 'LIKE', "%{$patientName}%");
            });
        }
        return $query;
    }

    // Nuevo Query Scope para filtrar por turno
    public function scopeShiftId($query, $shiftId)
    {
        if ($shiftId) {
            return $query->where('shift_id', $shiftId);
        }
        return $query;
    }
}