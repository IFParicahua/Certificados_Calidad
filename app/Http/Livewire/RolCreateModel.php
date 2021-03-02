<?php

namespace App\Http\Livewire;

use App\Models\Operation;
use App\Models\Rol;
use App\Models\RolOperation;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RolCreateModel extends Component
{
    public $operation_list = [];
    public $rol;

    public function save_rol(){
        $this->validate([
            'rol' => 'required',
            'operation_list' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $rol = new Rol();
            $rol->name = $this->rol;
            $rol->save();
            foreach($this->operation_list as $item){
                $operation = new RolOperation();
                $operation->rol_id = $rol->id;
                $operation->operation_id = $item;
                $operation->save();
            }
            $this->operation_list = '';
            $this->rol = '';
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ocurrio un error, vuele a intentar!!',
                'timeout' => 10000
            ]);
        }

        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshParent');
    }

    public function render()
    {
        $operations = Operation::all();
        return view('livewire.rol-create-model', compact('operations'));
    }
}
