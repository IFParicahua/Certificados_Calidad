<?php

namespace App\Http\Livewire;

use App\Models\Lot;
use App\Models\Mechanic;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ModelCreateMecanica extends Component
{
    public  $id_edit;
    public  $lote;
    public  $Fy;
    public  $Fx;
    public  $A;
    public  $FyFx;
    public  $D;
    public $mensajeLote;

    protected $listeners = [
        'getDataId'
    ];

    public function save(){
        $this->validate([
            'lote' => 'required',
            'Fy' => 'required',
            'Fx' => 'required',
            'A' => 'required',
            'FyFx' => 'required',
            'D' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $lot = Lot::where('code', $this->lote)->first();
            if ($lot) {
                if($this->id_edit){
                    $item = Mechanic::find($this->id_edit);
                    $item->lot_id = $lot->id;
                    $item->fy = $this->Fy;
                    $item->fx = $this->Fx;
                    $item->a = $this->A;
                    $item->re = $this->FyFx;
                    $item->d = $this->D;
                    $item->save();
                    $this->id_edit = '';
                    $this->lote = '';
                    $this->Fy = '';
                    $this->Fx = '';
                    $this->A = '';
                    $this->FyFx = '';
                    $this->D = '';
                }else{
                    $item = new Mechanic;
                    $item->lot_id = $lot->id;
                    $item->fy = $this->Fy;
                    $item->fx = $this->Fx;
                    $item->a = $this->A;
                    $item->re = $this->FyFx;
                    $item->d = $this->D;
                    $item->save();
                    $this->lote = '';
                    $this->Fy = '';
                    $this->Fx = '';
                    $this->A = '';
                    $this->FyFx = '';
                    $this->D = '';
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

    public function getDataId($modelId){
        $this->id_edit = $modelId;
        $mecanic = Mechanic::find($this->id_edit);
        $this->lote = $mecanic->lote->code ;
        $this->Fy = $mecanic->fy ;
        $this->Fx = $mecanic->fx ;
        $this->A = $mecanic->a ;
        $this->FyFx = $mecanic->re ;
        $this->D = $mecanic->d ;
    }

    public function render()
    {
        return view('livewire.model-create-mecanica');
    }
}
