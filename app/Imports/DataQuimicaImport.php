<?php

namespace App\Imports;

use App\Models\Lot;
use App\Models\Chemical;
use Maatwebsite\Excel\Concerns\ToModel;

class DataQuimicaImport implements ToModel
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

        return new Chemical([
            'c' => $row[1],
            'mn' => $row[2],
            'si' => $row[3],
            'p' => $row[4],
            's' => $row[5],
            'lot_id' => $dato,
        ]);
    }
}
