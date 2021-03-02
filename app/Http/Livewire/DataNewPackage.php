<?php

namespace App\Http\Livewire;

use App\Models\Imprimir;
use App\Models\Package;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Print_;

class DataNewPackage extends Component
{

    public $id_label = '';
    public $deleteId;

    protected $listeners = [
        'getView'
    ];

    public function getView($id){
        $this->id_label = $id;
        $this->dispatchBrowserEvent('imprimirbtn');
    }

    public function selectItem($id){

    }

    public function deleteId($id){
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('openModal');
    }

    public function eliminar()
    {
        DB::beginTransaction();
        try {
            $item = Package::find($this->deleteId);
            $item->delete();
            $this->dispatchBrowserEvent('closeModal');
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
        $datos = Package::where('lots_id', $this->id_label)->get();
        return view('livewire.data-new-package', compact('datos'));
    }
}
