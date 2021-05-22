<?php

namespace App\Http\Livewire\Clientes;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;
class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';
    public $clienteid;

    public function updatingSearch(){
        session()->flash('no_clientes', 'No hay ningún cliente que coincida con la búsquedad');
        $this->resetPage();
    }

    public function eliminarCliente($id){
        Cliente::destroy($id);
        session()->flash('eliminado', 'El cliente se eliminó correctamente');
        $this->resetPage();

    }

    public function render()
    {
        $cliente = Cliente::find($this->clienteid);
        return view('livewire.clientes.index', [
            'clientes' => Cliente::where('nombre', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
