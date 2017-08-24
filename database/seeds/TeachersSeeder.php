<?php

use Illuminate\Database\Seeder;

class TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'name'              => 'Sergio',
            'lastname'          => 'Pineda',
            'address'           => 'coatepeque',
            'phone'             => '78458745',
            'cellphone'          => '54878545',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Mario',
            'lastname'          => 'Estrada',
            'address'           => '7ma calle 7-98 zona 3reu',
            'phone'             => '78748585',
            'cellphone'          => '99889656',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Maximiliano',
            'lastname'          => 'Rojas',
            'address'           => '5ta avenida 8-965 zona 9 guatemala',
            'phone'             => '77487754',
            'cellphone'          => '46588987',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Edgar',
            'lastname'          => 'Matul',
            'address'           => 'Huehuetenango',
            'phone'             => '98979664',
            'cellphone'          => '45654889',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Eduardo',
            'lastname'          => 'Jerez',
            'address'           => 'Mazatenango',
            'phone'             => '45668795',
            'cellphone'          => '99896563',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Jose',
            'lastname'          => 'Ford',
            'address'           => 'coatepeque',
            'phone'             => '45456765',
            'cellphone'          => '78979866',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Carlos',
            'lastname'          => 'Mcdonalds',
            'address'           => '1ra calle colonia el recado zona 5 jutiapa',
            'phone'             => '55666569',
            'cellphone'          => '54878545',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Julio',
            'lastname'          => 'Maldonado',
            'address'           => '6ta casa nivel 2 estructura minerva zona 7 jalisco',
            'phone'             => '45566554',
            'cellphone'          => '45665485',
            'qualification'     => 10,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Marjory',
            'lastname'          => 'Hernandez',
            'address'           => 'calle estephan 2 direccion suroeste entronque 5',
            'phone'             => '12234568',
            'cellphone'          => '44568566',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('teachers')->insert([
            'name'              => 'Carla',
            'lastname'          => 'Rodas',
            'address'           => '45 metros atras de calle solidaridad zona 9 entrada el valle 2',
            'phone'             => '45455658',
            'cellphone'          => '15556855',
            'qualification'     => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
    }
}
