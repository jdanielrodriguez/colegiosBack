<?php

use Illuminate\Database\Seeder;

class Cycles_Studying_Days_Grades_Subjects_TeachersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 1,
            'teacher'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 3,
            'teacher'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 5,
            'teacher'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 8,
            'teacher'       => 3,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 7,
            'teacher'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 9,
            'teacher'       => 4,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 10,
            'teacher'       => 3,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 14,
            'teacher'       => 3,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 13,
            'teacher'       => 6,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 20,
            'teacher'       => 5,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 15,
            'teacher'       => 7,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('cycles_studying_days_grades_subjects_teachers')->insert([
            'state'       => 1,
            'csdgs'       => 21,
            'teacher'       => 8,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
    }
}
