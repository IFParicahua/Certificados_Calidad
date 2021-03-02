<?php

namespace App\Http\Livewire;

use App\Models\Lot;
use Livewire\Component;

class DataNewCertificado extends Component
{
    public $id_cer = '';

    protected $listeners = [
        'getView'
    ];

    public function getView($id){
        $this->id_cer = $id;
    }

    public function render()
    {
        $items = Lot::where('certicado_id', $this->id_cer)->get();
        return view('livewire.data-new-certificado', compact('items'));
    }
}
