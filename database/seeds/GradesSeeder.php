<?php

use Illuminate\Database\Seeder;

class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
            'name'              => '1ro Basico',
            'code'              => '010-01',
            'correlative'       => 1,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '2do Basico',
            'code'              => '010-02',
            'correlative'       => 2,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '3ro Basico',
            'code'              => '010-03',
            'correlative'       => 3,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '4to Bachillerato',
            'code'              => '003-01',
            'correlative'       => 4,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '5to Bachillerato',
            'code'              => '003-02',
            'correlative'       => 1,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '5to PAE',
            'code'              => '001-02',
            'correlative'       => 2,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '4to PAE',
            'code'              => '001-01',
            'correlative'       => 1,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '6to PAE',
            'code'              => '001-03',
            'correlative'       => 3,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '4to PC',
            'code'              => '090-01',
            'correlative'       => 1,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '5to PC',
            'code'              => '090-02',
            'correlative'       => 1,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('grades')->insert([
            'name'              => '6to PC',
            'code'              => '090-03',
            'correlative'       => 1,
            'year'              => '2017-02-13',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);


        
    }
}
