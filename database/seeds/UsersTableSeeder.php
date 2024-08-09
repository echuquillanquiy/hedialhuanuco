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

        User::create([
            'name' => 'GISSELA ZORRILLA',
            'email' => 'gzorrilla@gmail.com',
            'password' => bcrypt('12345678'),
            'dni' => '46589635',
            'code_specialty'=> '123456',
            'rne' => '23456',
            'role' => 'doctor'
        ]);

        User::create([
            'name' => 'ELVIS MONTOYA',
            'email' => 'emontoya@gmail.com',
            'password' => bcrypt('12345678'),
            'dni' => '46589636',
            'code_specialty'=> '123457',
            'rne' => 'NO APLICA',
            'role' => 'enfermera'
        ]);
    }
}
