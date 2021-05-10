<?php

namespace App\Http\Livewire\Stock;

use App\Models\Stock;

use Livewire\Component;

class Edit extends Component
{

    public $codigo;
    public $cantidad;
    public $articulo;
    public $egreso = false;

    protected $rules = [

        'codigo' => 'required',
        'cantidad' => 'required'

    ];

    public function mostrarArticulo(){

        $this->validate();

        $articulo_aux = Stock::where('codigo', $this->codigo)->get();

        if(!empty($articulo_aux[0])){
            $articulo = $articulo_aux[0];
        }

        if(empty($articulo->nombre)){

            session()->flash('mensaje', 'No hay ningún articulo con ese código');
            $this->articulo = null;

        }else{
            $this->articulo = $articulo;
        }

        


    }

    public function egreso(){

        $articulo = Stock::find($this->articulo->id);

        if($this->cantidad > $articulo->cantidad){

            session()->flash('cantidad', 'La cantidad que se descuenta no debe ser mayor al stock disponible');

        }else{

            $articulo->cantidad = $articulo->cantidad - $this->cantidad;
            $articulo->save();

            $this->articulo = $articulo;            
            session()->flash('egreso', '¡Egreso de mercadería exitoso!');

        }


    }

    public function render()
    {
        return view('livewire.stock.edit');
    }
}
