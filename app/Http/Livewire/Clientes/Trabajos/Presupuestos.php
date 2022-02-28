<?php

namespace App\Http\Livewire\Clientes\Trabajos;

use Livewire\Component;
use App\Models\Cotizacion;
use App\Models\Material;
use App\Models\Stock;
use App\Models\Mano;

use App\Models\Real;
use App\Models\Materialr;
use App\Models\Manor;
use Livewire\WithPagination;

class Presupuestos extends Component
{

//------ Presupuesto inicial ------//
    public $presupuestoid;
    public $presupuesto_inicial;
    public $fecha_visita;
    public $logistica;
    public $comision;
    public $precio_total;

    //----- Material -------//
        public $material;
        public $cantidad;
        //use WithPagination;
        //protected $paginationTheme = 'bootstrap';
        public $search = '';

        
    
        public function updatingSearch()
        {
    
            session()->flash('no_articulos', 'No hay ningún artículo que coincidad con la búsquedad');

        }
    
        public function agregarArticulo($id){
    
            $producto_material = new Material;
            $producto = Stock::where('id', $id)->first();

            $producto_material->codigo_producto = $producto->codigo;
            $producto_material->nombre = $producto->nombre;

            $producto_material->precio_venta = $producto->precio_venta;
            $producto_material->precio_costo = $producto->precio_costo;
            $producto_material->cotizacion_id = $this->presupuestoid;

        
           if($this->cantidad == null || !is_numeric($this->cantidad) || $this->cantidad <= 0){
                session()->flash('material_no_cargado', 'El artículo no se cargó, verifique que la cantidad se escribió correctamente');
           }else{
            
                $producto_material->cantidad = $this->cantidad;
                $producto_material->save();
                $this->material = Material::where('cotizacion_id', $this->presupuestoid)->get();
                session()->flash('material_cargado', '!Material cargado correctamente!');
           }

        }

        public function borrarMaterial($id){
            Material::destroy($id);
            $this->material = Material::where('cotizacion_id', $this->presupuestoid)->get();
            session()->flash('material_eliminado', 'Artículo eliminado del material correctamente');
        }

        public function modificarArticulo($id){

            $articulo = Material::find($id);
            if($this->cantidad == null || !is_numeric($this->cantidad) || $this->cantidad <= 0){
                session()->flash('material_no_cargado', 'La cantidad no se actualizó, verifique se escribió correctamente');
           }else{
            
                $articulo->cantidad = $this->cantidad;
                $articulo->save();
                $this->material = Material::where('cotizacion_id', $this->presupuestoid)->get();
           }

        }


    //----------------------//


    //------ Mano de obra ------//
        public $mano_obra;
        public $tipo_trabajo;
        public $precio_metro_cuadrado;
        public $fecha_mano;


        public function cargarManoObra(){

            $this->validate([
                "tipo_trabajo" => "required",
                "precio_metro_cuadrado" => "required",
                "fecha_mano" => "required||date"
            ], [
                "tipo_trabajo.required" => "Este campo es obligatorio",
                "precio_metro_cuadrado.required" => "Este campo es obligatorio",
                "fecha_mano.required" => "Este campo es obligatorio",
                "fecha_mano.date" => "Este campo debe tener un formato de fecha válido"
            ]);

            $mano_obra = New Mano;
            $mano_obra->tipo_trabajo = $this->tipo_trabajo;
            $mano_obra->precio_metro_cuadrado = $this->precio_metro_cuadrado;
            $mano_obra->fecha_mano = $this->fecha_mano;
            $mano_obra->cotizacion_id = $this->presupuestoid;
            $mano_obra->save();
            $this->mano_obra = Mano::where('cotizacion_id', $this->presupuestoid)->get();
            session()->flash('mano_obra', 'Mano de obra cargada correctamente');

            

        }

        public function borrarManoObra($id){
            Mano::destroy($id);
            $this->mano_obra = Mano::where('cotizacion_id', $this->presupuestoid)->get();
            session()->flash('mano_obra_eliminada', 'Mano de obra eliminada correctamente');
        }


    //--------------------------//


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


//---------------------------------//


//------- Presupuesto final (real) -------//
    public $trabajoid;
    public $realid;
    public $presupuesto_real;
    public $fecha_visita_real;
    public $logistica_real;
    public $comision_real;
    public $precio_total_real;


    //----- Material -------//
        public $material_real;
        public $cantidad_real;
    

        public function agregarArticuloReal($id){

            $producto_material = new Materialr;
            $producto = Stock::where('id', $id)->first();

            $producto_material->codigo_producto = $producto->codigo;
            $producto_material->nombre = $producto->nombre;

            $producto_material->precio_venta = $producto->precio_venta;
            $producto_material->precio_costo = $producto->precio_costo;
            $producto_material->real_id= $this->realid;

        
           if($this->cantidad_real == null || !is_numeric($this->cantidad_real) || $this->cantidad_real <= 0){
                session()->flash('material_no_cargado', 'El artículo no se cargó, verifique que la cantidad se escribió correctamente');
           }else{

                $producto_material->cantidad = $this->cantidad_real;
                $producto_material->save();
                $this->material_real = Materialr::where('real_id', $this->realid)->get();
                session()->flash('material_cargado', '!Material cargado correctamente!');
           }

        }

        public function borrarMaterialReal($id){
            Materialr::destroy($id);
            $this->material_real = Materialr::where('real_id', $this->realid)->get();
            session()->flash('material_eliminado', 'Artículo eliminado del material correctamente');
        }

        public function modificarArticuloReal($id){

            $articulo = Materialr::find($id);
            if($this->cantidad_real == null || !is_numeric($this->cantidad_real) || $this->cantidad_real <= 0){
                session()->flash('material_no_cargado', 'La cantidad no se actualizó, verifique se escribió correctamente');
           }else{

                $articulo->cantidad = $this->cantidad_real;
                $articulo->save();
                $this->material_real = Materialr::where('real_id', $this->realid)->get();
           }

        }
    //----------------------//

    //------ Mano de obra ------//
        public $mano_obra_real;
        public $tipo_trabajo_real;
        public $precio_metro_cuadrado_real;
        public $fecha_mano_real;


        public function cargarManoObraReal(){

            $this->validate([
                "tipo_trabajo_real" => "required",
                "precio_metro_cuadrado_real" => "required",
                "fecha_mano_real" => "required||date"
            ], [
                "tipo_trabajo_real.required" => "Este campo es obligatorio",
                "precio_metro_cuadrado_real.required" => "Este campo es obligatorio",
                "fecha_mano_real.required" => "Este campo es obligatorio",
                "fecha_mano_real.date" => "Este campo debe tener un formato de fecha válido"
            ]);

            $mano_obra = New Manor;
            $mano_obra->tipo_trabajo = $this->tipo_trabajo_real;
            $mano_obra->precio_metro_cuadrado = $this->precio_metro_cuadrado_real;
            $mano_obra->fecha_mano = $this->fecha_mano_real;
            $mano_obra->real_id = $this->realid;
            $mano_obra->save();
            $this->mano_obra_real = Manor::where('real_id', $this->realid)->get();
            session()->flash('mano_obra', 'Mano de obra cargada correctamente');



        }

        public function borrarManoObraReal($id){
            Manor::destroy($id);
            $this->mano_obra_real = Manor::where('real_id', $this->realid)->get();
            session()->flash('mano_obra_eliminada', 'Mano de obra eliminada correctamente');
        }


    //--------------------------//



    public function actualizarPresupuestoReal(){
    
        $presupuesto = Real::find($this->realid);

        if(empty($this->logistica_real) && empty($this->comision_real) && empty($this->precio_total_real)){

            session()->flash('noPresupuestoAct', '¡No has hecho ningún cambio!');

        }else{

            if(!empty($this->logistica_real)){
                $presupuesto->logistica = $this->logistica_real;
            }
            if(!empty($this->comision_real)){
                $presupuesto->comision = $this->comision_real;
            }
            if(!empty($this->precio_total_real)){
                $presupuesto->precio_total = $this->precio_total_real;
            }
            $presupuesto->save();
            $this->presupuesto_real = $presupuesto; 
            session()->flash('presupuestoAct', '¡Dato(s) actualizados correctamente!');

        }
        
    }

    public function actualizarFechaReal(){
        $this->validate([
            "fecha_visita_real" => "required"
        ],
        [
            "fecha_visita.required" => "Este campo es obligatorio",
        ]);

        $presupuesto = Real::find($this->realid);
        $presupuesto->fecha_visita = $this->fecha_visita_real;
        $presupuesto->save();
        $this->presupuesto_real = $presupuesto;

    }

//----------------------------------------//

    public $activo = "";
    public $activo2 = "";

    public function showInicial(){
        $this->activo = "presupuesto_inicial";
    }

    public function showFinal(){
        $this->activo = "presupuesto_final";
    }

    public function showEmitirPresupuesto(){
        $this->activo = "emitir_presupuesto";
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
        $this->material = Material::where('cotizacion_id', $this->presupuestoid)->get();
        $this->mano_obra = Mano::where('cotizacion_id', $this->presupuestoid)->get();

        $this->presupuesto_real = Real::where('trabajo_id', $this->presupuesto_inicial->trabajo_id)->first();
        $this->realid = $this->presupuesto_real->id;
        $this->material_real = Materialr::where('real_id', $this->realid)->get();
        $this->mano_obra_real = Manor::where('real_id', $this->realid)->get();
    }


    public function render()
    {
        return view('livewire.clientes.trabajos.presupuestos', ['stocks' => Stock::where('nombre', 'like', '%'.$this->search.'%')->paginate(10)]);
    }
}
