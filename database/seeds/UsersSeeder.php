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

        DB::table('users')->insert([
            'username'          => 'Deaniell',
            'password'          => bcrypt('1234'),
            'email'             => 'deaniell@foxy.com',
            'firstname'         => 'Daniel',
            'lastname'          => 'Rodriguez',
            'privileges'        => 1,
            'type'              => 1,
            'student'           => 1,
            'teacher'           => null,
            'tutor'             => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('users')->insert([
            'username'          => 'alex',
            'password'          => bcrypt('1234'),
            'email'             => 'alex@foxy.com',
            'firstname'         => 'Alex',
            'lastname'          => 'Mejicanos',
            'privileges'        => 2,
            'type'              => 2,
            'student'           => 2,
            'teacher'           => null,
            'tutor'             => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('users')->insert([
            'username'          => 'guille',
            'password'          => bcrypt('1234'),
            'email'             => 'guillermo@foxy.com',
            'firstname'         => 'Guillermo',
            'lastname'          => 'Palacios',
            'privileges'        => 3,
            'type'              => 3,
            'student'           => 3,
            'teacher'           => null,
            'tutor'             => null,
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
            'type'              => 1,
            'student'           => null,
            'teacher'           => 4,
            'tutor'             => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('users')->insert([
            'username'          => 'ale',
            'password'          => bcrypt('1234'),
            'email'             => 'ale@foxy.com',
            'firstname'         => 'Alejandro',
            'lastname'          => 'Godoy',
            'privileges'        => 3,
            'type'              => 3,
            'student'           => null,
            'teacher'           => 5,
            'tutor'             => null,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
    }
}
