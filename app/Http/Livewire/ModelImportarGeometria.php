<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataGeometricaImport;
use Illuminate\Support\Facades\DB;

class ModelImportarGeometria extends Component
{
    use WithFileUploads;
    public $excelid;
    public $icon_file = "fa-folder-open";
    public $mensaje = "Suelte o seleccione el archivo xlsx o xls";

    public function submit(){
        $this->validate([
            'excelid' => 'required|mimes:xlsx,xls,csv'
        ]);
        DB::beginTransaction();
        try {
            Excel::import(new DataGeometricaImport, $this->excelid);
            // Sejecuta el emit para recargar un componente en este caso IndexComponent
            $this->emit('refreshParent');
            $this->excelid="";
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
        return view('livewire.model-importar-geometria');
    }
}
