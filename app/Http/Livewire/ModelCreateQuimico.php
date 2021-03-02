<?php

namespace App\Http\Livewire;

use App\Models\Chemical;
use App\Models\Lot;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ModelCreateQuimico extends Component
{
    public  $id_edit;
    public $lote;
    public $C;
    public $MN;
    public $SI;
    public $P;
    public $S;
    public $mensajeLote = '';

    protected $listeners = [
        'getDataId'
    ];


    public function getDataId($modelId){
        $this->id_edit = $modelId;
        $chemical = Chemical::find($this->id_edit);
        $this->lote = $chemical->lote->code ;
        $this->C = $chemical->c ;
        $this->MN = $chemical->mn ;
        $this->SI = $chemical->si ;
        $this->P = $chemical->p ;
        $this->S = $chemical->s ;
    }

    public function save(){
        $this->validate([
            'lote' => 'required',
            'C' => 'required',
            'MN' => 'required',
            'SI' => 'required',
            'P' => 'required',
            'S' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $lot = Lot::where('code', $this->lote)->first();
            if ($lot) {
                if($this->id_edit){
                    $item = Chemical::find($this->id_edit);
                    $item->lot_id = $lot->id;
                    $item->c = $this->C;
                    $item->mn = $this->MN;
                    $item->si = $this->SI;
                    $item->p = $this->P;
                    $item->s = $this->S;
                    $item->save();
                    $this->id_edit = '';
                    $this->lote = '';
                    $this->C = '';
                    $this->MN = '';
                    $this->SI = '';
                    $this->P = '';
                    $this->S = '';
                }else{
                    $item = new Chemical;
                    $item->lot_id = $lot->id;
                    $item->c = $this->C;
                    $item->mn = $this->MN;
                    $item->si = $this->SI;
                    $item->p = $this->P;
                    $item->s = $this->S;
                    $item->save();
                    $this->lote = '';
                    $this->C = '';
                    $this->MN = '';
                    $this->SI = '';
                    $this->P = '';
                    $this->S = '';
                }
                $this->mensajeLote = '';
            } else {
                $this->mensajeLote = 'Este Lote no existe';
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ocurrio un error, vuele a intentar!!',
                'timeout' => 10000
            ]);
        }

        $this->emit('refreshParent');
    }

    public function render()
    {
        return view('livewire.model-create-quimico');
    }
}
