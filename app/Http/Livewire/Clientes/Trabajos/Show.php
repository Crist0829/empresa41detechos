<?php

namespace App\Http\Livewire\Clientes\Trabajos;

use Livewire\Component;
use App\Models\Trabajo;
use App\Models\Cliente;
use App\Models\Orden;

class Show extends Component
{
    public $trabajo;
    public $trabajoid;
    public $cliente;
    public $activo = "";

    public $orden_visita;


    public $fecha_orden;
    public $horario_visita;
    public $tipo_trabajo;
    public $techo_de;
    public $alto;
    public $escalera;
    public $contacto;
    public $observaciones;
    public $superficie_total;
    public $metros_cuadrados;

    protected $rules = [

        "fecha_orden" => "required",
        "horario_visita" => "required",
        "tipo_trabajo" => "required",
        "techo_de" => "required",
        "alto" => "required",
        "contacto" => "required",
        "superficie_total" => "required",
        "metros_cuadrados" => "required"
    ];

    protected $messages = [

        "fecha_orden.required" => "Este campo es obligatorio",
        "horario_visita.required" => "Este campo es obligatorio",
        "tipo_trabajo.required" => "Este campo es obligatorio",
        "techo_de.required" => "Este campo es obligatorio",
        "alto.required" => "Este campo es obligatorio",
        "contacto.required" => "Este campo es obligatorio",
        "observaciones.required" => "Este campo es obligatorio",
        "superficie_total.required" => "Este campo es obligatorio",
        "metros_cuadrados.required" => "Este campo es obligatorio"

    ];

    public function cargarOrden(){

        $this->validate();
        $orden = new Orden;
        $orden->fecha_orden = $this->fecha_orden;
        $orden->horario_visita = $this->horario_visita;
        $orden->tipo_trabajo = $this->tipo_trabajo;
        $orden->techo_de = $this->techo_de;
        $orden->alto = $this->alto;
        $orden->contacto = $this->contacto;
        if(empty($this->observaciones)){
            $orden->observaciones = "Ninguna";
        }else{
            $orden->observaciones = $this->observaciones;
        }
        $orden->superficie_total = $this->superficie_total;
        $orden->metros_cuadrados = $this->metros_cuadrados;
        if($this->escalera == 0){
            $this->escalera = 0;
        }else{
            $this->escalera = 1;
        }
        $orden->escalera = $this->escalera;
        $orden->trabajo_id = $this->trabajoid;
        $orden->save();
        session()->flash('cargado', '¡Orden cargada correctamente!');
        return redirect('/clientes/trabajos'.$this->trabajoid);

    }

    public function actualizarFecha(){
        $orden = Orden::where('trabajo_id', $this->trabajoid)->first();
        $orden->fecha_orden = $this->fecha_orden;
        $orden->save();
        $this->orden_visita = $orden;
    }

    public function actualizarOrden(){

    $orden = Orden::where('trabajo_id', $this->trabajoid)->first();
        
    if(empty($this->horario_visita) && empty($this->tipo_trabajo) && empty($this->techo_de) &&
    empty($this->alto) && empty($this->contacto) && empty($this->observaciones) && empty($this->superficie_total) && 
    empty($this->metros_cuadrados)){

        session()->flash('sinActualizacion', 'No has cambiado ningún dato');

    }else{

        if(!empty($this->horario_visita)){
            $orden->horario_visita = $this->horario_visita;
        }
        if(!empty($this->tipo_trabajo)){
            $orden->tipo_trabajo = $this->tipo_trabajo;
        }
        if(!empty($this->techo_de)){
            $orden->techo_de = $this->techo_de;
        }
        if(!empty($this->alto)){
            $orden->alto = $this->alto;
        }
        if(!empty($this->contacto)){
            $orden->contacto = $this->contacto;
        }
        if(!empty($this->observaciones)){
            $orden->observaciones = $this->observaciones;
        }
        if(!empty($this->superficie_total)){
            $orden->superficie_total = $this->superficie_total;
        }
        if(!empty($this->metros_cuadrados)){
            $orden->metros_cuadrados = $this->metros_cuadrados;
        }

        $orden->save();
        session()->flash('actualizado', '¡Los datos se actualizaron correctamente!');

    }

        
    }

    public function showOrden(){
        $this->activo = "orden_visita";
    }
    public function showPresupuestos(){
        $this->activo = "presupuestos";
    }

    public function mount(){
        $this->trabajo = Trabajo::where('id', $this->trabajoid)->first();
        $this->cliente = Cliente::where('id', $this->trabajo->cliente_id)->first();
        $this->orden_visita = Orden::where('trabajo_id', $this->trabajoid)->first();
    }

    public function render()
    {
        return view('livewire.clientes.trabajos.show');
    }
}
