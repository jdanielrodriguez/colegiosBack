<?php

use Illuminate\Database\Seeder;

class Cycles_Studying_Days_GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 1,
            'grade'       => 1,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 1,
            'grade'       => 2,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 1,
            'grade'       => 3,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 2,
            'grade'       => 4,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 2,
            'grade'       => 5,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 3,
            'grade'       => 6,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 3,
            'grade'       => 7,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 3,
            'grade'       => 8,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 4,
            'grade'       => 9,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 4,
            'grade'       => 10,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades')->insert([
            'state'       => 1,
            'cycle_study_day'       => 4,
            'grade'       => 11,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
    }
}
