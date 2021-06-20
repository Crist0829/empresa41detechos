<?php

namespace App\Http\Livewire\Clientes\Trabajos;

use Livewire\Component;
use App\Models\Cotizacion;

class Presupuestos extends Component
{

    public $presupuestoid;
    public $presupuesto_inicial;

    public $fecha_visita;
    public $logistica;
    public $comision;
    public $precio_total;

    public $activo = "";
    public $activo2 = "";

    public function showInicial(){
        $this->activo = "presupuesto_inicial";
    }

    public function showFinal(){
        $this->activo = "presupuesto_final";
    }

    public function showComparacion(){
        $this->activo = "comparacion";
    }

    public function noShow(){
        $this->activo = "";
    }

    public function showInfoPre(){
        $this->activo2 = "info_presupuesto";
    }
    public function showMaterial(){
        $this->activo2 = "material";
    }
    public function showMano(){
        $this->activo2 = "mano_obra";
    }
    public function noShow2(){
        $this->activo2 = "";
    }


    public function mount(){
        $this->presupuesto_inicial = Cotizacion::where('id', $this->presupuestoid)->first();
    }

    public function actualizarPresupuesto(){
        

        $presupuesto = Cotizacion::find($this->presupuestoid);

        if(empty($this->logistica) && empty($this->comision) && empty($this->precio_total)){

            session()->flash('noPresupuestoAct', '¡No has hecho ningún cambio!');

        }else{

            if(!empty($this->logistica)){
                $presupuesto->logistica = $this->logistica;
            }
            if(!empty($this->comision)){
                $presupuesto->comision = $this->comision;
            }
            if(!empty($this->precio_total)){
                $presupuesto->precio_total = $this->precio_total;
            }
            $presupuesto->save();
            session()->flash('presupuestoAct', '¡Dato(s) actualizados correctamente!');

        }
        
    }

    public function actualizarFecha(){
        $this->validate([
            "fecha_visita" => "required"
        ],
        [
            "fecha_visita.required" => "Este campo es obligatorio",
        ]);

        $presupuesto = Cotizacion::find($this->presupuestoid);
        $presupuesto->fecha_visita = $this->fecha_visita;
        $presupuesto->save();
        $this->presupuesto_inicial = $presupuesto;

    }

    public function render()
    {
        return view('livewire.clientes.trabajos.presupuestos');
    }
}
