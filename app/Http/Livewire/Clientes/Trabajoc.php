<?php

namespace App\Http\Livewire\Clientes;

use Livewire\Component;
use App\Models\Trabajo;
class Trabajoc extends Component
{

    public $idcliente;
    public $nombre, $fecha;

    protected $rules = [
        "nombre" => "required",
        "fecha" => "required",
    ];

    protected $messages = [
        "nombre.required" => 'Este campo es obligatorio',
        "fecha.required" => 'Este campo es obligatorio'
    ];



    public function cargarTrabajo(){
        
        $this->validate();
        $trabajo = new Trabajo;
        $trabajo->nombre = $this->nombre;
        $trabajo->fecha = $this->fecha;
        $trabajo->cliente_id = rtrim($this->idcliente, "/");
        $trabajo->save();
        session()->flash('cargado', '¡Trabajo cargado correctamente!');
        return redirect('/clientes/show/'.$this->idcliente);

    }

    public function render()
    {
        return view('livewire.clientes.trabajoc');
    }
}
