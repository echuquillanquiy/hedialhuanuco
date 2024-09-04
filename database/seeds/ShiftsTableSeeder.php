<?php

use Illuminate\Database\Seeder;
use App\Shift;

class ShiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shift::create([
    		'name' => 'I',
    	]);

    	Shift::create([
    		'name' => 'II',
    	]);

    	Shift::create([
    		'name' => 'III',
    	]);

    	Shift::create([
    		'name' => 'IV',
    	]);
    }
}
