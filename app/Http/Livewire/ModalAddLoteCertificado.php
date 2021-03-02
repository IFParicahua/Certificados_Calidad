<?php

namespace App\Http\Livewire;

use App\Models\Lot;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ModalAddLoteCertificado extends Component
{

    public $producto = '';
    public $lote;
    public $certificado = '';

    protected $listeners = [
        'getAdd'
    ];

    public function getAdd($id){
        $this->certificado = $id;
    }


    public function saveLot(){
        $this->validate([
            'producto' => 'required',
            'lote' => 'required',
            'certificado' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $lot = Lot::find($this->lote);
            $lot->certicado_id = $this->certificado;
            $lot->masa_lineal = '1212';
            $lot->save();
            $this->lote = '';
            $this->emit('getView', $this->certificado);
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

        $products = Product::all();
        $lotes = Lot::where([['product_id', $this->producto],['certicado_id', null]])->get();
        return view('livewire.modal-add-lote-certificado', compact('products','lotes'));
    }
}
