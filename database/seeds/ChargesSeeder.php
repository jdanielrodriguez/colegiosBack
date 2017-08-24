<?php

use Illuminate\Database\Seeder;

class ChargesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('charges')->insert([
            'tuition'           => false,
            'inscription'       => true,
            'charge_limit'      => '2017-02-10',
            'quantity'          => 4000,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-02-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-03-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-04-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-05-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-06-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-07-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-08-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-09-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-10-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 1,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => false,
            'inscription'       => true,
            'charge_limit'      => '2017-02-10',
            'quantity'          => 4000,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-02-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-03-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-04-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-05-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-06-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-07-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-08-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-09-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('charges')->insert([
            'tuition'           => true,
            'inscription'       => false,
            'charge_limit'      => '2017-10-15',
            'quantity'          => 200,
            'increase'          => 15,
            'idinscription'     => 2,
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
    }
}
