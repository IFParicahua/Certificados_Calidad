<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class Rol_OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol_operations')->insert([
            [
                'rol_id' => 1,
                'operation_id' => 1
            ],[
                'rol_id' => 1,
                'operation_id' => 2
            ],[
                'rol_id' => 1,
                'operation_id' => 3
            ],[
                'rol_id' => 2,
                'operation_id' => 1
            ],[
                'rol_id' => 2,
                'operation_id' => 2
            ]
        ]);
    }
}
