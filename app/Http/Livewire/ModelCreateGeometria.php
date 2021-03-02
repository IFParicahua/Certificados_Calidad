<?php

namespace App\Http\Livewire;

use App\Models\Geometry;
use Livewire\Component;
use App\Models\Lot;
use Illuminate\Support\Facades\DB;

class ModelCreateGeometria extends Component
{
    public  $id_edit;
    public  $lote;
    public  $altura;
    public  $espaciamiento;
    public  $gap;
    public  $angulo;
    public $mensajeLote;

    protected $listeners = [
        'getDataId'
    ];

    public function save(){
        $this->validate([
            'lote' => 'required',
            'altura' => 'required',
            'espaciamiento' => 'required',
            'gap' => 'required',
            'angulo' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $lot = Lot::where('code', $this->lote)->first();
            if ($lot) {
                if($this->id_edit){
                    $item = Geometry::find($this->id_edit);
                    $item->lot_id = $lot->id;
                    $item->altura = $this->altura;
                    $item->espaciamiento = $this->espaciamiento;
                    $item->gap = $this->gap;
                    $item->angulo = $this->angulo;
                    $item->save();
                    $this->id_edit = '';
                    $this->lote = '';
                    $this->altura = '';
                    $this->espaciamiento = '';
                    $this->gap = '';
                    $this->angulo = '';
                }else{
                    $item = new Geometry;
                    $item->lot_id = $lot->id;
                    $item->altura = $this->altura;
                    $item->espaciamiento = $this->espaciamiento;
                    $item->gap = $this->gap;
                    $item->angulo = $this->angulo;
                    $item->save();
                    $this->lote = '';
                    $this->altura = '';
                    $this->espaciamiento = '';
                    $this->gap = '';
                    $this->angulo = '';
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
        $geometry = Geometry::find($this->id_edit);
        $this->lote = $geometry->lote->code ;
        $this->altura = $geometry->altura ;
        $this->espaciamiento = $geometry->espaciamiento ;
        $this->gap = $geometry->gap ;
        $this->angulo = $geometry->angulo ;
    }

    public function render()
    {
        return view('livewire.model-create-geometria');
    }
}
