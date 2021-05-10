<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;
use App\Models\Stock;

class Show extends Component
{

    public $stockid;
    public $articulo;

    public $nombre;
    public $codigo;
    public $medida;
    public $cantidad;
    public $precio_costo;
    public $precio_venta;
    public $stock_minimo;

    public function update(){

        $articulo = Stock::find($this->stockid);

        if(empty($this->codigo)){
            $this->codigo = $articulo->codigo;
        }

        if(empty($this->nombre)){
            $this->nombre = $articulo->nombre;
        }

        if(empty($this->medida)){
            $this->medida = $articulo->medida;
        }

        if(empty($this->cantidad)){
            $this->cantidad = $articulo->cantidad;
        }

        if(empty($this->precio_costo)){
            $this->precio_costo = $articulo->precio_costo;
        }

        if(empty($this->precio_venta)){
            $this->precio_venta = $articulo->precio_venta;
        }

        if(empty($this->stock_minimo)){
            $this->stock_minimo = $articulo->stock_minimo;
        }

        $articulo->nombre = $this->nombre;
        $articulo->codigo = $this->codigo;
        $articulo->medida = $this->medida;
        $articulo->cantidad = $this->cantidad;
        $articulo->precio_costo = $this->precio_costo;
        $articulo->precio_venta = $this->precio_venta;
        $articulo->stock_minimo = $this->stock_minimo;

        $articulo->save();
        $this->articulo = $articulo;
        session()->flash('actualizado', '¡Los datos se actualizaron correctamente!');


    }

    public function eliminar(){

        Stock::destroy($this->stockid);
        session()->flash('eliminado', '¡Artículo eliminado correctamente!');
        return redirect()->to('/stock');

    }

    public function mount(){
        $articulo = Stock::where('id', $this->stockid)->get();
        $this->articulo = $articulo[0];
    }

    public function render()
    {
        return view('livewire.stock.show');
    }
}
