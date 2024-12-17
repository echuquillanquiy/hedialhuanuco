<?php

use Illuminate\Database\Seeder;
use App\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Room::create([
    		'name' => 'I',
    	]);

    	Room::create([
    		'name' => 'II',
    	]);

    	Room::create([
    		'name' => 'III',
    	]);

        Room::create([
    		'name' => 'IV',
    	]);
    }
}
