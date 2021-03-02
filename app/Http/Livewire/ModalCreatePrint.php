<?php

namespace App\Http\Livewire;

use App\Models\Imprimir;
use App\Models\Lot;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ModalCreatePrint extends Component
{
    public $producto;
    public $code;
    public $status;
    public $turno;
    public $date_new;

    public function savelote(){
        $this->validate([
            'code' => 'required',
            'producto' => 'required'
        ]);
        $e = Lot::where('code', $this->code)->first();
        if($e){
            $dato = $e->id;

        }else{
            $col = new Lot;
            $col->code = $this->code;
            $col->save();
            $dato = $col->id;

        }
        DB::beginTransaction();
        try {
            $fecha = new Carbon;
            $prin = new Imprimir;
            $prin->date_print = $fecha;
            $prin->turn = $this->turno;
            $prin->user_id = Auth::user()->id;
            $prin->save();
            $lot = new Lot;
            $lot->code = $dato;
            $lot->product_id = $this->producto;
            $lot->print_id = $prin->id;
            $lot->save();
            $this->status = 'disabled';
            $this->emit('getDetail', $lot->id);
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
        if($this->code == null){
            $this->status = '';
        }
        $hora = date("H");
        if($hora < 6){
            $this->turno = 'Noche';
        }elseif ($hora < 11) {
            $this->turno = 'día';
        }elseif ($hora < 18) {
            $this->turno = 'Tarde';
        }else{
            $this->turno = 'Noche';
        }
        $this->date_new = date("d/m/Y");
        $products = Product::all();
        return view('livewire.modal-create-print', compact('products'));
    }
}
