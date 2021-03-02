<?php

namespace App\Http\Livewire;

use App\Models\Certification;
use App\Models\Client;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModalCreateCertificado extends Component
{
    public $aprobado;
    public $cliente;
    public $certificado;
    public $status;
    public $pedido_de_venta;
    public $orden_de_salida;

    public function save(){
        $this->validate([
            'cliente' => 'required',
            'aprobado' => 'required',
            'pedido_de_venta' => 'required',
            'orden_de_salida' => 'required',
        ]);
        $fecha = new Carbon;
        DB::beginTransaction();
        try {
            $cl = new Client;
            $cl->name = $this->cliente;
            $cl->save();

            $cer = new Certification;
            $cer->n_pedido = $this->pedido_de_venta;
            $cer->n_orden = $this->orden_de_salida;
            $cer->n_certificado = 'SDLL-FR-1302-003-0 / 26-02-2021';
            $cer->peso_neto = 14;
            $cer->date = $fecha;
            $cer->user_id = Auth::user()->id;
            $cer->aprobado_id = $this->aprobado;
            $cer->cliente_id = $cl->id;
            $cer->save();
            $this->status = 'disabled';
            $this->emit('getAdd', $cer->id);
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
        if($this->cliente == null){
            $this->status = '';
        }
        $users = User::all();
        return view('livewire.modal-create-certificado', compact('users'));
    }
}
