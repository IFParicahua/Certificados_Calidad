<?php

namespace App\Imports;

use App\Models\Lot;
use App\Models\Mechanic;
use Maatwebsite\Excel\Concerns\ToModel;

class DataMecanicaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $e = Lot::where('code', $row[0])->first();
        if($e){
            $dato = $e->id;

        }else{
            $col = new Lot;
            $col->code = $row[0];
            $col->product_id = 1;
            $col->save();
            $dato = $col->id;

        }

        return new Mechanic([
            'fy' => $row[2],
            'fx' => $row[3],
            'a' => $row[4],
            're' => $row[5],
            'd' => $row[6],
            'lot_id' => $dato,
        ]);
    }
}
