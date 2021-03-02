<?php

namespace App\Imports;

use App\Models\Lot;
use App\Models\Geometry;
use Maatwebsite\Excel\Concerns\ToModel;

class DataGeometricaImport implements ToModel
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
            $col->save();
            $dato = $col->id;
        }

        return new Geometry([
            'altura' => $row[2],
            'espaciamiento' => $row[3],
            'gap' => $row[4],
            'angulo' => $row[5],
            'lot_id' => $dato,
        ]);
    }
}
