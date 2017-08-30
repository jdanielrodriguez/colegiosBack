<?php

use Illuminate\Database\Seeder;

class TutorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tutors')->insert([
            'firstname'              => 'Sergio',
            'lastname'          => 'Pineda',
            'address'           => 'coatepeque',
            'phone'             => '78458745',
            'cellphone'          => '54878545',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
    }
}
