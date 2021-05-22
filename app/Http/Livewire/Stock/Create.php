<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;
use App\Models\Stock;

class Create extends Component
{

    public $nombre;
    public $codigo;
    public $medida;
    public $cantidad;
    public $precio_costo;
    public $precio_venta;
    public $stock_minimo;

    protected $rules = [
        'nombre' => 'required|min:6',
        'medida' => 'required',
        'codigo' => 'required',
        'cantidad' => 'required',
        'precio_costo' => 'required',
        'precio_venta' => 'required',
        'stock_minimo' => 'required',
    ];

    public function submit(){

        $this->validate();

        $articulo = new Stock;

        $articulo->nombre = $this->nombre;
        $articulo->codigo = $this->codigo;
        $articulo->medida = $this->medida;
        $articulo->cantidad = $this->cantidad;
        $articulo->precio_costo = $this->precio_costo;
        $articulo->precio_venta = $this->precio_venta;
        $articulo->stock_minimo = $this->stock_minimo;
        $articulo->save();
        
        session()->flash('agregado', '¡Artículo agregado correctamente!');

    }


    public function render()
    {
        return view('livewire.stock.create');
    }
}
