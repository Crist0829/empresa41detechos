<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;
use App\Models\Stock;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = '';

    public function updatingSearch()
    {
        session()->flash('no_articulos', 'No hay ningún artículo que coincidad con la búsquedad');
        $this->resetPage();
    }

    public function eliminarArticulo($id){

        Stock::destroy($id);
        session()->flash('eliminado', '¡Artículo eliminado correctamente!');
        $this->resetPage();

    }

    public function render()
    {
        return view('livewire.stock.index', ['stocks' => Stock::where('nombre', 'like', '%'.$this->search.'%')->paginate(5)]);
    }
}
