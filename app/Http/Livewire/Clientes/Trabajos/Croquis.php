<?php

namespace App\Http\Livewire\Clientes\Trabajos;

use Livewire\Component;
use App\Models\Orden;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Croquis extends Component
{
    use WithFileUploads;

    public $croquis_techo;
    public $croquis_ubicacion;

    public $ordenid;
    public $orden_visita;
    public $actualizar_croquis_techo = false;
    public $actualizar_croquis_ubicacion = false;

    public function mostrarActualizarTecho(){
        $this->actualizar_croquis_techo = true;
    }
    public function ocultarActualizarTecho(){
        $this->actualizar_croquis_techo = false;
    }

    public function mostrarActualizarUbi(){
        $this->actualizar_croquis_ubicacion = true;
    }
    public function ocultarActualizarUbi(){
        $this->actualizar_croquis_ubicacion = false;
    }
    public function cargarCroquisTecho(){
        $this->validate([
            "croquis_techo" => 'image|max:4096',
        ],
        [
            "croquis_techo.image" => "El archivo debe ser una imagen",
            "croquis_techo.max" => "La imagen debe tener un tamaño máximo de 4MB"
        ]);

        $croquis_nombre = "croquisT_".$this->ordenid.".".$this->croquis_techo->extension();
        $this->croquis_techo->storeAs('croquis', $croquis_nombre);
        $orden = Orden::find($this->ordenid);
        $orden->techo_extension = $this->croquis_techo->extension();
        $orden->croquis_techo = Storage::url($croquis_nombre);
        $orden->save();
        $this->orden = $orden;
        session()->flash('techo_cargado', 'El croquis del techo se cargó correctamente');
        return redirect('/clientes/trabajos/'.$this->orden_visita->trabajo_id);

    }
    public function cargarCroquisUbicacion(){

        $this->validate([
            "croquis_ubicacion" => 'image|max:4096',
        ],
        [
            "croquis_ubicacion.image" => "El archivo debe ser una imagen",
            "croquis_ubicacion.max" => "La imagen debe tener un tamaño máximo de 4MB"
        ]);

        $croquis_nombre = "croquisU_".$this->ordenid.".".$this->croquis_ubicacion->extension();
        $this->croquis_ubicacion->storeAs('croquis', $croquis_nombre);
        $orden = Orden::find($this->ordenid);
        $orden->ubicacion_extension = $this->croquis_ubicacion->extension();
        $orden->croquis_ubicacion = Storage::url($croquis_nombre);
        $orden->save();
        $this->orden = $orden;
        session()->flash('ubicacion_cargada', 'El croquis de la ubicación se cargó correctamente');
        return redirect('/clientes/trabajos/'.$this->orden_visita->trabajo_id);

    }

    public function actualizarCroquisTecho(){

        $this->validate([
            "croquis_techo" => 'image|max:4096',
        ],
        [
            "croquis_techo.image" => "El archivo debe ser una imagen",
            "croquis_techo.max" => "La imagen debe tener un tamaño máximo de 4MB"
        ]);

        Storage::delete("croquis", "croquisT_".$this->orden_visita->id.".".$this->orden_visita->techo_extension);
        $croquis_nombre = "croquisT_".$this->ordenid.".".$this->croquis_techo->extension();
        $this->croquis_techo->storeAs('croquis', $croquis_nombre);
        $orden = Orden::find($this->ordenid);
        $orden->croquis_techo = Storage::url($croquis_nombre);
        $orden->techo_extension = $this->croquis_techo->extension();
        $orden->save();
        $this->orden = $orden;
        session()->flash('techo_actualizado', 'El croquis del techo se actualizó correctamente');
        return redirect('/clientes/trabajos/'.$this->orden_visita->trabajo_id);

    }
    public function actualizarCroquisUbi(){

        $this->validate([
            "croquis_ubicacion" => 'image|max:4096',
        ],
        [
            "croquis_ubicacion.image" => "El archivo debe ser una imagen",
            "croquis_ubicacion.max" => "La imagen debe tener un tamaño máximo de 4MB"
        ]);

        Storage::delete("croquis", "croquisU_".$this->orden_visita->id.".".$this->orden_visita->ubicacion_extension);
        $croquis_nombre = "croquisU_".$this->ordenid.".".$this->croquis_ubicacion->extension();
        $this->croquis_ubicacion->storeAs('croquis', $croquis_nombre);
        $orden = Orden::find($this->ordenid);
        $orden->croquis_ubicacion = Storage::url($croquis_nombre);
        $orden->ubicacion_extension = $this->croquis_ubicacion->extension();
        $orden->save();
        $this->orden = $orden;
        session()->flash('ubicacion_actualizada', 'El croquis de la ubicación se actualizó correctamente');
        return redirect('/clientes/trabajos/'.$this->orden_visita->trabajo_id);

    }


    public function eliminarCroquisTecho(){
        Storage::delete("croquis", "croquisT_".$this->orden_visita->id.".".$this->orden_visita->techo_extension);
        $orden = Orden::find($this->ordenid);
        $orden->croquis_techo = null;
        $orden->techo_extension = null;
        $orden->save();
        session()->flash('techo_eliminado', 'El croquis del techo se eliminó correctamente');
        return redirect('/clientes/trabajos/'.$this->orden_visita->trabajo_id);
    }
    public function eliminarCroquisUbi(){
        Storage::delete("croquis", "croquisU_".$this->orden_visita->id.".".$this->orden_visita->techo_extension);
        $orden = Orden::find($this->ordenid);
        $orden->croquis_ubicacion = null;
        $orden->ubicacion_extension = null;
        $orden->save();
        session()->flash('ubicacion_eliminada', 'El croquis de la ubicacion se eliminó correctamente');
        return redirect('/clientes/trabajos/'.$this->orden_visita->trabajo_id);
    }

    public function mount(){
        $this->orden_visita = Orden::find($this->ordenid);
    }

    public function render()
    {
        return view('livewire.clientes.trabajos.croquis');
    }
}
