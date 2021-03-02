<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PaquetePdfController extends Controller
{
    public function generate($id){
        // $collection = PrintDetail::where('print_label_id', $id)->get();

        $collection = Package::where('id', $id)->get();

        $pdf = PDF::loadView('package-pdf', compact('collection'));
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream();
        //return view('generatepdf', compact('collection'));
    }
}
