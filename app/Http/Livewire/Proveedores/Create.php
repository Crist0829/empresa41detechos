<?php

namespace App\Http\Livewire\Proveedores;

use Livewire\Component;
use App\Models\Proveedor;


class Create extends Component
{

    public $nombre;
    public $documento;
    public $telefono;
    public $forma_pago;
    public $email;

    protected $rules = [

        'nombre' => 'required',
        'documento' => 'required',
        'telefono' => 'required',
        'email' => 'required|email'

    ];

    public function cargarProveedor(){

        $this->validate();

        $proveedor = new Proveedor;
        $proveedor->nombre = $this->nombre;
        $proveedor->documento = $this->documento;
        $proveedor->telefono = $this->telefono;
        $proveedor->email = $this->email;
        if($this->forma_pago != ""){
            $proveedor->forma_pago = $this->forma_pago;
        }
        $proveedor->save();
        session()->flash('proveedor', '¡El proveedor fue cargado correctamente!');

    }

    public function render()
    {
        return view('livewire.proveedores.create');
    }
}
