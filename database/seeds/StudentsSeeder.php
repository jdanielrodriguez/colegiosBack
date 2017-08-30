<?php

use Illuminate\Database\Seeder;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'firstname'              => 'Daniel',
            'lastname'          => 'Rodriguez',
            'address'           => '3era calle 7-52 zona1',
            'phone'             => '78723695',
            'cellphone'         => '54646431',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('students')->insert([
            'firstname'              => 'Estuardo',
            'lastname'          => 'Rocha',
            'address'           => '5ta avenida 5-89 zon 5 guatemala',
            'phone'             => '78723695',
            'cellphone'         => '54646431',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        
        DB::table('students')->insert([
            'firstname'              => 'Elena',
            'lastname'          => 'Westerhouse',
            'address'           => '4ta calle 7-34 zona 5 quetzaltenango',
            'phone'             => '21122520',
            'cellphone'         => '12123542',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('students')->insert([
            'firstname'              => 'Mariela',
            'lastname'          => 'Perez',
            'address'           => '8va avenida 4-56 zona 2 mazatenango',
            'phone'             => '11452205',
            'cellphone'         => '12124546',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('students')->insert([
            'firstname'              => 'Carmela',
            'lastname'          => 'Minerva',
            'address'           => '3ra avenida 9-89 calle redentor jalisco',
            'phone'             => '44525462',
            'cellphone'         => '11452251',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('students')->insert([
            'firstname'              => 'Leonor',
            'lastname'          => 'Delgado',
            'address'           => '0 calle 8-96 minerva 2',
            'phone'             => '58545869',
            'cellphone'         => '45578966',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('students')->insert([
            'firstname'              => 'Amilcar',
            'lastname'          => 'Arana',
            'address'           => 'colonia carranza casa #39 altos de cotzul',
            'phone'             => '78784585',
            'cellphone'         => '45448752',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('students')->insert([
            'firstname'              => 'Alejandra',
            'lastname'          => 'Flores',
            'address'           => '7ma avenida tercera casa derecha diagonal 7',
            'phone'             => '87878788',
            'cellphone'         => '45678958',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('students')->insert([
            'firstname'              => 'Manuel',
            'lastname'          => 'Rascon',
            'address'           => '9na avenida 45-45 zona 0 guatemala',
            'phone'             => '98589654',
            'cellphone'         => '65989856',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('students')->insert([
            'firstname'              => 'Estevan',
            'lastname'          => 'Godoy',
            'address'           => 'avenida elisa norte 389',
            'phone'             => '98578485',
            'cellphone'         => '25487458',
            'signed_up'         => 1,
            'leaves'            => 1, 
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
    }
}
