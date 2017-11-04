<?php

use Illuminate\Database\Seeder;

class Tutors_StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutors_students')->insert([
            'tutor'         => '1',
            'student'          => '1',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
    }
}
