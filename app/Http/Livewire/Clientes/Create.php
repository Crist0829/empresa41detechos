<?php

namespace App\Http\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;

class Create extends Component
{

    public $nombre, $documento, $email, $telefono, $direccion, $fecha;

    protected $rules = [
        'nombre' => 'required|min:6',
        'documento' => 'required',
        'email' => 'required|email',
        'telefono' => 'required',
        'direccion' => 'required',
        'fecha' => 'required'
    ];

    protected $messages = [

        'nombre.required' => 'Este campo es obligatorio',
        'nombre.min' => 'Este campo debe tener más de 6 carácteres',
        'documento.required' => 'Este campo es obligatorio',
        'email.required' => 'Este campo es obligatorio',
        'email.email' => 'Este campo debe tener un fórmato de email válido',
        'telefono.required' => 'Este campo es obligatorio',
        'direccion.required' => 'Este campo es obligatorio',
        'fecha.required' => 'Este campo es obligatorio',

    ];


    public function cargarCliente(){

        $this->validate();

        $cliente = new Cliente;
        $cliente->nombre = $this->nombre;
        $cliente->documento = $this->documento;
        $cliente->email = $this->email;
        $cliente->telefono = $this->telefono;
        $cliente->fecha = $this->fecha;
        $cliente->direccion = $this->direccion;
        $cliente->save();
        session()->flash('cliente', '¡El cliente fue cargado correctamente!');

    }

    public function render()
    {
        return view('livewire.clientes.create');
    }
}
