<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_types')->insert([
            'description'       => 'Alumno',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('users_types')->insert([
            'description'       => 'Maestro',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('users_types')->insert([
            'description'       => 'Padre',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users_types')->insert([
            'description'       => 'Administrador',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        
        DB::table('users')->insert([
            'username'          => 'alumno',
            'password'          => bcrypt('alumno'),
            'email'             => 'deaniell@foxy.com',
            'firstname'         => 'Daniel',
            'lastname'          => 'Rodriguez',
            'privileges'        => 1,
            'state'             => 1,
            'student'           => 1,
            'teacher'           => null,
            'tutor'             => null,
            'type'              => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'username'          => 'maestro',
            'password'          => bcrypt('maestro'),
            'email'             => 'alex@foxy.com',
            'firstname'         => 'Mario',
            'lastname'          => 'Estrada',
            'privileges'        => 2,
            'state'             => 1,
            'student'           => null,
            'teacher'           => 2,
            'tutor'             => null,
            'type'              => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'username'          => 'admin',
            'password'          => bcrypt('admin'),
            'email'             => 'guillermo@foxy.com',
            'firstname'         => "Admin",
            'lastname'          => "Sys",
            'privileges'        => 3,
            'state'             => 1,
            'student'           => null,
            'teacher'           => null,
            'tutor'             => null,
            'type'              => 4,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'username'          => 'alumno2',
            'password'          => bcrypt('alumno2'),
            'email'             => 'tofel@foxy.com',
            'firstname'         => 'Andre',
            'lastname'          => 'Juarez',
            'privileges'        => 1,
            'state'             => 1,
            'student'           => null,
            'teacher'           => 4,
            'tutor'             => null,
            'type'              => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'username'          => 'padre',
            'password'          => bcrypt('padre'),
            'email'             => 'ale@foxy.com',
            'firstname'         => 'Sergio',
            'lastname'          => 'Pineda',
            'privileges'        => 3,
            'state'             => 1,
            'student'           => null,
            'teacher'           => null,
            'tutor'             => 1,
            'type'              => 3,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
            ]);
        

       
    }
}
