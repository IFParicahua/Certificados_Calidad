<?php

namespace App\Http\Livewire;

use App\Models\Certification;
use Livewire\Component;
use Livewire\WithPagination;

class DataCertificadoComponent extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $certificates = Certification::orderBy('id', 'desc')->paginate(10);
        return view('livewire.data-certificado-component', compact('certificates'));
    }
}
