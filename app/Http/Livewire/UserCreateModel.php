<?php

namespace App\Http\Livewire;

use App\Models\Rol;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserCreateModel extends Component
{

    public $rol;
    public $name;
    public $email;
    public $password;

    public function save_user(){
        $this->validate([
            'rol' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->rol_id = $this->rol;
            $user->company_id = 1;
            $user->save();
            $this->rol = '';
            $this->name = '';
            $this->email = '';
            $this->password = '';
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->emit('swal:alert', [
                'icon'    => 'error',
                'title'   => 'Ocurrio un error, vuele a intentar!!',
                'timeout' => 10000
            ]);
        }

        $this->dispatchBrowserEvent('closeModaluser');
        $this->emit('refreshParent');
    }

    public function render()
    {
        $roles = Rol::all();
        return view('livewire.user-create-model', compact('roles'));
    }
}
