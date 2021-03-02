<?php

namespace App\Http\Livewire;

use App\Models\Lot;
use App\Models\Package;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class DataPaqueteComponent extends Component
{
    use WithPagination;
    protected $queryString = ['search' => ['except' => '']];
    public $search = '';
    public $date;
    public $turno;
    public $resp;
    public $mat;
    public $delete;
    public $create;
    public $update;


    public function render()
    {


        $lote = Lot::where('code', $this->search)->first();

        if($lote){
            $packages = Package::where('lots_id', 'LIKE', $lote->id)->orderBy('id', 'desc')->paginate(10);
            $fech = date("d/m/Y", strtotime($packages->first()->lote->imprimir->date_print));
            $this->date = 'Fecha:'.$fech;
            $this->turno = 'Turno:'.$packages->first()->lote->imprimir->turn ;
            $this->resp = 'Responsable: '.$packages->first()->lote->imprimir->user->name ;
            $this->mat = 'Material: '.$packages->first()->lote->producto->description;
        }else{
            $packages = Package::orderBy('id', 'desc')->paginate(10);
            $this->date = '';
            $this->turno = '';
            $this->resp = '';
            $this->mat = '';
        }


        return view('livewire.data-paquete-component', compact('packages'));
    }
}
