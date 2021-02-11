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
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-02-10',
            'quantity'       => 4000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-02-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-03-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-04-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-05-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-06-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-07-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-08-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-10-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-02-10',
            'quantity'       => 4000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-02-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-03-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-04-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-05-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-06-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-07-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-08-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-10-15',
            'quantity'       => 200,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 1,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 3,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 3,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 4,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 4,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 5,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 5,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 6,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 6,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 7,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 7,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 8,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 8,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 9,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 9,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 10,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 10,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 0,
            'inscription'       => 1,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-17',
            'quantity'       => 1000,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
        DB::table('charges')->insert([
            'tuition'       => 1,
            'inscription'       => 0,
            'defaulter'       => 0,
            'charge_limit'       => '2017-09-15',
            'quantity'       => 500,
            'increase'       => 15,
            'state'       => 1,
            'idinscription'       => 2,
            'created_at'       => date('Y-m-d H:m:s'),
            'updated_at'       => date('Y-m-d H:m:s')
        ]);
    }
}
