<?php

namespace App\Http\Livewire;

use App\Models\Lot;
use App\Models\Package;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ModalCreatePackage extends Component
{
    public $lote;
    public $lote_code;
    public $paquete;
    public $peso;
    public $id_imp_pdf;

    protected $listeners = [
        'getDetail'
    ];

    public function getDetail($id){
        $this->lote = $id;
        $var1 = Lot::where('id', $id)->first();
        $this->lote_code = $var1->code;
    }

    public function savePackage(){
        $this->validate([
            'paquete' => 'required',
            'peso' => 'required',
            'lote' => 'required',
        ]);
        $peso = str_replace('.', '', $this->peso);
        $barcode = $this->lote_code."0".$this->paquete."".$peso;
        DB::beginTransaction();
        try {
            $item = new Package;
            $item->peso = $this->peso;
            $item->package = $this->paquete;
            $item->barcode = $barcode;
            $item->lots_id = $this->lote;
            $item->save();
            $this->id_imp_pdf = $item->id;
            $this->paquete = "";
            $this->peso = "";
            $this->emit('getView', $this->lote);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ocurrio un error, vuele a intentar!!',
                'timeout' => 10000
            ]);
        }
    }

    public function render()
    {
        return view('livewire.modal-create-package');
    }
}
