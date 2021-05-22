<?php

namespace App\Http\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente;
use App\Models\Trabajo;
use Livewire\WithPagination;
class Show extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $clienteid;
    public $cliente;
    public $activo = "";
    public $trabajos_aux = false;

    public $nombre, $documento, $direccion, $email, $telefono, $fecha;

    protected $rules = [

        "nombre" => 'required|min:6',
        "documento" => 'required',
        "direccion" => 'required',
        "email" => "required|email",
        "telefono" => "required",
        "fecha" => "required"

    ];


    protected $messages = [

        "nombre.required" => "Este campo es obligatorio",
        "nombre.min" => "Este campo debe tener más de 6 caracteres",
        "documento.required" => "Este campo es obligatorio",
        "telefono.required" => "Este campo es obligatorio",
        "email.required" => "Este campo es obligatorio",
        "email.email" => "Escriba un fórmato de email válido",
        "direccion" => "Este campo es obligatorio",
        "fecha.required" => "Este campo es obligatorio",

    ];

    public function updateInfo(){

        $cliente = Cliente::find($this->clienteid);

        if(empty($this->nombre) && empty($this->documento) && empty($this->direccion) && empty($this->email) &&
        empty($this->fecha)&& empty($this->telefono)){
            session()->flash('errorA', '¡Asegúrate de llenar por lo menos un campo!');
        }else{
            if(empty($this->nombre)){
                $this->nombre = $cliente->nombre;
            }
    
            if(empty($this->documento)){
                $this->documento = $cliente->documento;
            }
            if(empty($this->email)){
                $this->email = $cliente->email;
            }
            if(empty($this->telefono)){
                $this->telefono = $cliente->telefono;
            }
            if(empty($this->direccion)){
                $this->direccion = $cliente->direccion;
            }
            if(empty($this->fecha)){
                $this->fecha = $cliente->fecha;
            }

            $this->validate();

            $cliente->nombre = $this->nombre;
            $cliente->documento = $this->documento;
            $cliente->telefono = $this->telefono;
            $cliente->email = $this->email;
            $cliente->fecha = $this->fecha;
            $cliente->direccion = $this->direccion;
            $cliente->save();
            $this->cliente = $cliente;
            session()->flash('actualizado', '¡La información ha sido actualizada correctamente!');

        }

    }
    public function showInfo(){
        $this->activo = "informacion";
    }
    public function showTraba(){
        $this->activo = "trabajos";
    }
    public function noShow(){
        $this->activo = "";
    }

    public function finalizarTrabajo($id){
        $trabajo = Trabajo::find($id);
        $trabajo->finalizado = 1;
        $trabajo->save();
    }
    public function noFinalizarTrabajo($id){
        $trabajo = Trabajo::find($id);
        $trabajo->finalizado = 0;
        $trabajo->save();
    }

    public function eliminarTrabajo($id){
        Trabajo::destroy($id);
        session()->flash('eliminado', '¡Trabajo eliminado correctamente!');
        return redirect('clientes/show/'.$this->clienteid);
    }

    public function mount(){
        $this->cliente = Cliente::where('id', $this->clienteid)->first();
        $this->idcliente = $this->cliente->id;
    }

    public function render()
    {
        return view('livewire.clientes.show', 
            ['trabajos' => Trabajo::where('cliente_id', $this->clienteid)->paginate(5)]
        );
    }
}
