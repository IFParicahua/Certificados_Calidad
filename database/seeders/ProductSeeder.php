<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'longitud' => 12,
                'diametro' => 9.5,
                'material' => 'A',
                'description' => 'BARRA AH 500 9,50 MM RECTA DE 12 M',
            ],[
                'longitud' => 12,
                'diametro' => 12,
                'material' => 'B',
                'description' => 'BARRA AH 500 12,00 MM RECTA DE 12 M',
            ],[
                'longitud' => 12,
                'diametro' => 16,
                'material' => 'C',
                'description' => 'BARRA AH 500 16,00 MM RECTA DE 12 M',
            ],[
                'longitud' => 12,
                'diametro' => 20,
                'material' => 'D',
                'description' => 'BARRA AH 500 20,00 MM RECTA DE 12 M',
            ],[
                'longitud' => 12,
                'diametro' => 25,
                'material' => 'E',
                'description' => 'BARRA AH 500 25,00 MM RECTA DE 12 M',
            ],[
                'longitud' => 12,
                'diametro' => 32,
                'material' => 'F',
                'description' => 'BARRA AH 500 32,00 MM RECTA DE 12 M',
            ]
        ]);
    }
}
