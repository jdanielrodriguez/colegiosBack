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
            'username'          => 'Deaniell',
            'password'          => bcrypt('1234'),
            'email'             => 'deaniell@foxy.com',
            'firstname'         => 'Daniel',
            'lastname'          => 'Rodriguez',
            'privileges'        => 1,
            'state'             => 1,
            'student'           => 1,
            'teacher'           => null,
            'tutor'             => null,
            'type'              => 1,
            'deleted_at'        => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'username'          => 'alex',
            'password'          => bcrypt('1234'),
            'email'             => 'alex@foxy.com',
            'firstname'         => 'Mario',
            'lastname'          => 'Estrada',
            'privileges'        => 2,
            'state'             => 1,
            'student'           => null,
            'teacher'           => 2,
            'tutor'             => null,
            'type'              => 2,
            'deleted_at'        => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'username'          => 'guille',
            'password'          => bcrypt('1234'),
            'email'             => 'guillermo@foxy.com',
            'firstname'         => null,
            'lastname'          => null,
            'privileges'        => 3,
            'state'             => 1,
            'student'           => null,
            'teacher'           => null,
            'tutor'             => null,
            'type'              => 4,
            'deleted_at'        => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'username'          => 'andre',
            'password'          => bcrypt('1234'),
            'email'             => 'tofel@foxy.com',
            'firstname'         => 'Andre',
            'lastname'          => 'Juarez',
            'privileges'        => 1,
            'state'             => 1,
            'student'           => null,
            'teacher'           => 4,
            'tutor'             => null,
            'type'              => 1,
            'deleted_at'        => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
        DB::table('users')->insert([
            'username'          => 'ale',
            'password'          => bcrypt('1234'),
            'email'             => 'ale@foxy.com',
            'firstname'         => 'Sergio',
            'lastname'          => 'Pineda',
            'privileges'        => 3,
            'state'             => 1,
            'student'           => null,
            'teacher'           => null,
            'tutor'             => 1,
            'type'              => 3,
            'deleted_at'        => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
            ]);
        

       
    }
}
