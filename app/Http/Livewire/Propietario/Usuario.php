<?php

namespace App\Http\Livewire\Propietario;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class Usuario extends Component
{

    public $userid;
    public $usuario;
    public $rol = '';

    public function cambiarRol(){

        $user = User::find($this->userid);
        $user->rol = $this->rol;
        $user->save();
        $this->usuario = $user;
    }

    public function mount(){

        $usuario = User::where('id', $this->userid)->get();
        $this->usuario = $usuario[0];

    }

    public function render()
    {
        return view('livewire.propietario.usuario');
    }
}
