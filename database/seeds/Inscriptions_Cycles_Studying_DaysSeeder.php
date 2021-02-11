<?php

use Illuminate\Database\Seeder;

class Inscriptions_Cycles_Studying_DaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 1,
            'inscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 1,
            'inscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 2,
            'inscription'       => 3,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 2,
            'inscription'       => 4,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 3,
            'inscription'       => 5,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 3,
            'inscription'       => 6,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 4,
            'inscription'       => 7,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 4,
            'inscription'       => 8,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 5,
            'inscription'       => 9,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 5,
            'inscription'       => 10,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 6,
            'inscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
    }
}
