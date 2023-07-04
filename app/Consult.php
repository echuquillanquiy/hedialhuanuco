<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    protected $guarded = ['id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function code1()
    {
        return $this->belongsTo(Medicament::class, 'code1');
    }

    public function code2()
    {
        return $this->belongsTo(Medicament::class, 'code2');
    }
    public function code3()
    {
        return $this->belongsTo(Medicament::class, 'code3');
    }

    public function code4()
    {
        return $this->belongsTo(Medicament::class, 'code4');
    }

    public function code5()
    {
        return $this->belongsTo(Medicament::class, 'code5');
    }
    public function code6()
    {
        return $this->belongsTo(Medicament::class, 'code6');
    }

    public function code7()
    {
        return $this->belongsTo(Medicament::class, 'code7');
    }

    public function code8()
    {
        return $this->belongsTo(Medicament::class, 'code8');
    }
    public function code9()
    {
        return $this->belongsTo(Medicament::class, 'code9');
    }

    public function code10()
    {
        return $this->belongsTo(Medicament::class, 'code10');
    }

    public function code11()
    {
        return $this->belongsTo(Medicament::class, 'code11');
    }

    public function code12()
    {
        return $this->belongsTo(Medicament::class, 'code12');
    }

    public function code13()
    {
        return $this->belongsTo(Medicament::class, 'code13');
    }

}
