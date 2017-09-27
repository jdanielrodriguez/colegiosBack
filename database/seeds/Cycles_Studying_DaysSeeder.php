<?php

use Illuminate\Database\Seeder;

class Cycles_Studying_DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cycles_studying_days')->insert([
            'state'       => 1,
            'year'       => '2017-09-01',
            'begin'       => '2017-09-01',
            'end'       => '2017-10-01',
            'inscription'       => 1000,
            'tuiton'       => 500,
            'cycle'       => 1,
            'study_day'       => 1,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days')->insert([
            'state'       => 1,
            'year'       => '2017-09-01',
            'begin'       => '2017-09-01',
            'end'       => '2017-10-01',
            'inscription'       => 1000,
            'tuiton'       => 500,
            'cycle'       => 2,
            'study_day'       => 1,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days')->insert([
            'state'       => 1,
            'year'       => '2017-09-01',
            'begin'       => '2017-09-01',
            'end'       => '2017-10-01',
            'inscription'       => 1000,
            'tuiton'       => 500,
            'cycle'       => 3,
            'study_day'       => 1,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days')->insert([
            'state'       => 1,
            'year'       => '2017-09-01',
            'begin'       => '2017-09-01',
            'end'       => '2017-10-01',
            'inscription'       => 1000,
            'tuiton'       => 500,
            'cycle'       => 4,
            'study_day'       => 1,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
    }
}
