<?php

use Illuminate\Database\Seeder;

class SubjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name'              => 'Matematica Financiera',
            'description'       => 'Matematica para Finanzas',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Matematica',
            'description'       => 'Matematica algebraica',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Ciencias Sociales',
            'description'       => 'Ciencias de la Sociedad',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Lenguaje',
            'description'       => 'Enseñanzas de las lenguas',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Ingles',
            'description'       => 'Idioma ingles',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Contabilidad',
            'description'       => 'Contabilidad Basica',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Estructura',
            'description'       => 'Matematica Estructural',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Chapeo 2',
            'description'       => 'Te enseñan a chapear',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Educacion Fisica',
            'description'       => 'Corre Cerote',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);

        DB::table('subjects')->insert([
            'name'              => 'Biologia',
            'description'       => 'Mira esas Tetas',
            'created_at'        => date('Y-m-d H:m:s'),
            'updated_at'        => date('Y-m-d H:m:s')
        ]);
    }
}
