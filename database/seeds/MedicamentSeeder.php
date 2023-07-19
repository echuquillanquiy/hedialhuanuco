<?php

use App\Medicament;
use Illuminate\Database\Seeder;

class MedicamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Medicament::create([
            'codigo' => '05491',
            'descripcion' => 'Piridoxina 50mg TAB',
            'c_referencial' => '30',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '06127',
            'descripcion' => 'Tiamina 100 mg TAB',
            'c_referencial' => '30',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '00200',
            'descripcion' => 'Ácido fólico 500 mcg (0,5 mg) TAB ',
            'c_referencial' => '30',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '28897',
            'descripcion' => 'Sevelamero 800 mg TAB ',
            'c_referencial' => '90',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '20635',
            'descripcion' => 'Carbonato de Calcio 1,25 g TAB',
            'c_referencial' => '90',
            'frecuencia' => 'Mensual',
        ]);


        Medicament::create([
            'codigo' => '01502',
            'descripcion' => 'Calcitriol 1 mcg/mL INY AMP',
            'c_referencial' => '13',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '01503',
            'descripcion' => 'Calcitriol 0,25mcg (ug) TAB',
            'c_referencial' => '60',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '03078',
            'descripcion' => 'Enalapril maleato 10 mg TAB',
            'c_referencial' => '60',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '01522',
            'descripcion' => 'Captopril 25 mg TAB ',
            'c_referencial' => '90',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '00671',
            'descripcion' => 'Amlodipino 10 mg TAB ',
            'c_referencial' => '90',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '05018',
            'descripcion' => 'Nifedipino 10 mg TAB o CAP',
            'c_referencial' => '90',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '05021',
            'descripcion' => 'Nifedipino de 30 mg TAB o CAP ',
            'c_referencial' => '60',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '04701',
            'descripcion' => 'Metildopa 250 mg TAB',
            'c_referencial' => '90',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '00900',
            'descripcion' => 'Atenolol 100 mg TAB',
            'c_referencial' => '30',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '04523',
            'descripcion' => 'Losartan potásico 50 mg TAB',
            'c_referencial' => '60',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '19238',
            'descripcion' => 'Hierro',
            'c_referencial' => '4',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '03107',
            'descripcion' => 'Epoetina 2000',
            'c_referencial' => '12',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '03113',
            'descripcion' => 'Epoetina alfa 4000',
            'c_referencial' => '6',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '03979',
            'descripcion' => 'Vitamina B12 Hidroxocobalamina',
            'c_referencial' => '12',
            'frecuencia' => 'Mensual',
        ]);

        Medicament::create([
            'codigo' => '02496',
            'descripcion' => 'Vitamina B TAB o CAP',
            'c_referencial' => '30',
            'frecuencia' => 'Mensual',
        ]);
    }
}
