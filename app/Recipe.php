<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function med1()
    {
        return $this->belongsTo(Medicament::class, 'med1');
    }

    public function med2()
    {
        return $this->belongsTo(Medicament::class, 'med2');
    }

    public function med3()
    {
        return $this->belongsTo(Medicament::class, 'med3');
    }

    public function med4()
    {
        return $this->belongsTo(Medicament::class, 'med4');
    }

    public function med5()
    {
        return $this->belongsTo(Medicament::class, 'med5');
    }

    public function med6()
    {
        return $this->belongsTo(Medicament::class, 'med6');
    }

    public function med7()
    {
        return $this->belongsTo(Medicament::class, 'med7');
    }

    public function med8()
    {
        return $this->belongsTo(Medicament::class, 'med8');
    }

    public function med9()
    {
        return $this->belongsTo(Medicament::class, 'med9');
    }

    public function med10()
    {
        return $this->belongsTo(Medicament::class, 'med10');
    }

    public function med11()
    {
        return $this->belongsTo(Medicament::class, 'med11');
    }

    public function med12()
    {
        return $this->belongsTo(Medicament::class, 'med12');
    }

    public function med13()
    {
        return $this->belongsTo(Medicament::class, 'med13');
    }

    public function med14()
    {
        return $this->belongsTo(Medicament::class, 'med14');
    }

    public function med15()
    {
        return $this->belongsTo(Medicament::class, 'med15');
    }

    public function med16()
    {
        return $this->belongsTo(Medicament::class, 'med16');
    }

    public function med17()
    {
        return $this->belongsTo(Medicament::class, 'med17');
    }

    public function med18()
    {
        return $this->belongsTo(Medicament::class, 'med18');
    }

    public function med19()
    {
        return $this->belongsTo(Medicament::class, 'med19');
    }

    public function med20()
    {
        return $this->belongsTo(Medicament::class, 'med20');
    }
}
