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
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 1,
            'inscription'       => 2,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 2,
            'inscription'       => 3,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 2,
            'inscription'       => 4,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 3,
            'inscription'       => 5,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 3,
            'inscription'       => 6,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 4,
            'inscription'       => 7,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 4,
            'inscription'       => 8,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 5,
            'inscription'       => 9,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 5,
            'inscription'       => 10,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('inscriptions_cycles_studying_days_grades')->insert([
            'state'       => 1,
            'csdg'       => 6,
            'inscription'       => 2,
            'deleted_at'       => null,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
    }
}
