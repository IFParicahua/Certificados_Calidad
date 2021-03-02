<?php

namespace App\Http\Livewire;

use App\Models\Rol;
use App\Models\User;
use Livewire\Component;

class DataUserComponent extends Component
{
    public $search;
    public $prompt;

    protected $listeners = [
        'refreshParent'
    ];

    public function refreshParent(){
        $this->prompt = " ";
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', "%{$this->search}%")->orderBy('id', 'desc')->get();
        $roles = Rol::all();
        return view('livewire.data-user-component', compact('users', 'roles'));
    }
}
