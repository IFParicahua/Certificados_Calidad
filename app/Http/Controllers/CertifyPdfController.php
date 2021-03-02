<?php

namespace App\Http\Controllers;

use App\Models\Certification;
use App\Models\Company;
use App\Models\Lot;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class CertifyPdfController extends Controller
{
    public function showPDF($id){

        $fecha = date('m/d/Y');
        $items = Lot::where('certicado_id', $id)->get();
        $img = asset('img/logo_las_lomas-05.png') ;
        $titles = Certification::where('id', $id)->first();
        $empresa = Company::where('id', 1)->first();
        $total = 6-($items->count());
        if($total > 0){
            $val = 6-($items->count());
        }else{
            $val = 0;
        }

        $pdf = PDF::loadView('certification-pdf', compact('fecha','items','img','titles','empresa','val'));
        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream();
        //return view('certification-pdf', compact('fecha','items','img','titles','empresa','val'));
    }
}
