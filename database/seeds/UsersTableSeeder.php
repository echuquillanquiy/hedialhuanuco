<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Raúl Eduardo Chuquillanqui Yupanqui',
	        'email' => 'echuquillanquiy@gmail.com',
	        'password' => bcrypt('12345678'),
	        'dni' => '46589634',
	        'code_specialty'=> 'NO APLICA',
	        'rne' => 'NO APLICA',
	        'role' => 'administrador'
    	]);
    }
}
