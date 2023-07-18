<?php

use App\Procedure;
use Illuminate\Database\Seeder;

class ProceduresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedure::create([
            'code' => '84520',
            'description' => 'Nitrógeno ureico; cuantitativo (Urea sérica)',
            'unit' => 'EXAMEN',
            'amount' => '2',
            'frequency' => 'MENSUAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '85014',
            'description' => 'Hematocrito',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'MENSUAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '85018',
            'description' => 'Hemoglobina',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'MENSUAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '80051',
            'description' => 'Perfil de electrolitos (Cloro, Sodio y Potasio).',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'MENSUAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '84100',
            'description' => 'Dosaje de Fósforo inorgánico (fosfato)',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'MENSUAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '82310',
            'description' => 'Dosaje de Calcio; total',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'MENSUAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '82040',
            'description' => 'Dosaje de Albúmina; suero, plasma o sangre total',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'TRIMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '84075',
            'description' => 'Dosaje de Fosfatasa alcalina',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'TRIMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '84450',
            'description' => 'Aspartato amino transferasa (AST) (SGOT)',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'BIMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '84460',
            'description' => 'Alanina amino Transferasa (ALT) (SGPT)',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'BIMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '86703',
            'description' => 'Anticuerpos; HIV-1 y HIV-2, análisis único',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'SEMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '86592',
            'description' => 'Prueba de sifilis; anticuerpo no treponémico; cualitativo',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'SEMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '83970',
            'description' => 'Dosaje de Paratohormona (hormona paratiroidea)',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'TRIMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '87340',
            'description' => 'Detección de antígenos de hepatitis B antigeno de superficie (HBsAg) ',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'SEMESTRAL',
            'observation' => 'EN PACIENTE NO PROTEGIDO CONTRA HEPATITS B',
        ]);

        Procedure::create([
            'code' => '86706',
            'description' => 'Anticuerpo contra el antígeno de superficie de la hepatitis B (HBsAb)',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'SEMESTRAL',
            'observation' => 'EN PACIENTE NO PROTEGIDO CONTRA HEPATITIS B ANUAL EN PACIENTE PROTEGIDO CONTRA HEPATITIS B',
        ]);

        Procedure::create([
            'code' => '86704',
            'description' => 'Anticuerpo contra el antígeno de la nucleocápside de la hepatitis B (HBcAb) total',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'SEMESTRAL',
            'observation' => 'EN PACIENTE NO PROTEGIDO CONTRA HEPATITIS B',
        ]);

        Procedure::create([
            'code' => '86803',
            'description' => 'Anticuerpo contra la hepatitis C',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'SEMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '86687',
            'description' => 'Anticuerpo para HTLV 1 ',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'SEMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '83540',
            'description' => 'Dosaje de Hierro',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'TRIMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '82728',
            'description' => 'Dosaje de Ferritina',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'TRIMESTRAL',
            'observation' => '',
        ]);

        Procedure::create([
            'code' => '84466',
            'description' => 'Dosaje de Transferrina',
            'unit' => 'EXAMEN',
            'amount' => '1',
            'frequency' => 'TRIMESTRAL',
            'observation' => '',
        ]);
    }
}
