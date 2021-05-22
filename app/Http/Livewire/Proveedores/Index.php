<?php

namespace App\Http\Livewire\Proveedores;

use Livewire\Component;
use App\Models\Proveedor;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch(){
        session()->flash('no_proveedores', 'No hay proveedores que coincidan con la búsquedad');
        $this->resetPage();
    }

    public function eliminarProveedor($id){
        Proveedor::destroy($id);
        session()->flash('eliminado', '¡Proveedor eliminado correctamente!');
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.proveedores.index', ['proveedores' => Proveedor::where('nombre', 'like', '%'.$this->search.'%')->paginate(5)]);
    }
}
