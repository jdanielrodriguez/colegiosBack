<?php

use Illuminate\Database\Seeder;

class InscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 3,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 4,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 5,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 6,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 7,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 8,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 9,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2017-01-01',
            'student'           => 10,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('inscriptions')->insert([
            'year'              => '2018-01-01',
            'student'           => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
    }
}
