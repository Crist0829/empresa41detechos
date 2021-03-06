<?php

namespace App\Http\Livewire\Propietario;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Usuarios extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function eliminarUsuario($id){
        User::destroy($id);
        $this->resetPage();
        session()->flash('eliminado', '¡Usuario eliminado correctamente!');
    }

    public function render()
    {
        return view('livewire.propietario.usuarios', ['users' => User::where('name', 'like', '%'.$this->search.'%')->paginate(10)]);
    }
}
