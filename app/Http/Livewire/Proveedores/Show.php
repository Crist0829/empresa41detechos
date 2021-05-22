<?php

namespace App\Http\Livewire\Proveedores;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Proveedor;
use App\Models\Vencimiento;
use App\Models\Cheque;
use App\Models\Producto;
use GuzzleHttp\Handler\Proxy;

class Show extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap'; 

    public $proveedorid;
    public $proveedor;
    public $activo = "";

    public $nombre;
    public $email;
    public $documento;
    public $telefono;
    public $forma_pago;

    public $productos_aux = false;
    public $vencimientos_aux = false;
    public $cheques_aux = false;

    public $nombre_producto;
    public $precio;
    public $fecha_compra;

    public $forma_pago_v;
    public $fecha_inicio;
    public $fecha_vencimiento;

    public $banco;
    public $numero;
    public $fecha_pago;
    public $fecha_vencimiento_c;
    public $pagado;

    protected $rules = [

        'nombre' => 'required',
        'email' => 'required|email',
        'documento' => 'required',
        'telefono' => 'required',
        'forma_pago' => 'required'
        
    ];

    public function updateInfo(){

        $proveedor = Proveedor::find($this->proveedorid);

        if(empty($this->nombre) && empty($this->documento) && empty($this->email) && empty($this->telefono) &&
            empty($this->forma_pago)){

            session()->flash('errorA', '¡Asegurate de llenar al menos un campo!');

        }else{

            if(empty($this->nombre)){
                $this->nombre = $proveedor->nombre;
            }
            if(empty($this->documento)){
                $this->documento = $proveedor->documento;
            }
            if(empty($this->email)){
                $this->email = $proveedor->email;
            }
            if(empty($this->telefono)){
                $this->telefono = $proveedor->telefono;
            }
            if(empty($this->forma_pago)){
                $this->forma_pago = $proveedor->forma_pago;
            }

            $this->validate();

            $proveedor->nombre = $this->nombre;
            $proveedor->documento = $this->documento;
            $proveedor->email = $this->email;
            $proveedor->telefono = $this->telefono;
            $proveedor->forma_pago = $this->forma_pago;
            $proveedor->save();
            $this->proveedor = $proveedor;
            session()->flash('actualizado', '¡Los datos se actualizaron correctamente!');
        }

    }

    public function cargarProducto(){

        $this->validate([

            'nombre_producto' => 'required',
            'precio' => 'required',
            'fecha_compra' => 'required'

        ]);

        $producto = new Producto;

        $producto->nombre_producto = $this->nombre_producto;
        $producto->precio = $this->precio;
        $producto->fecha_compra = $this->fecha_compra;
        $producto->proveedor_id = $this->proveedorid;
        $producto->save();
        $this->productos_aux = true;
        session()->flash('cargado', '¡Producto cargado correctamente!');
        return redirect('/proveedores/show/'.$this->proveedorid);
        

    }

    public function cargarVencimiento(){

        $this->validate([
            'forma_pago_v' => 'required',
            'fecha_vencimiento' => 'required',
            'fecha_inicio' => 'required'
        ]);

        $vencimiento = new Vencimiento;
        $vencimiento->fecha_inicio = $this->fecha_inicio;
        $vencimiento->forma_pago_v = $this->forma_pago_v;
        $vencimiento->fecha_vencimiento = $this->fecha_vencimiento;
        $vencimiento->proveedor_id = $this->proveedorid;
        $vencimiento->save();
        $this->vencimientos_aux = true;
        session()->flash('vencimiento', '¡Datos de vencimiento de pago cargados correctamente!');
        return redirect('/proveedores/show/'.$this->proveedorid);

    }

    public function noShow(){
        $this->activo = "";
    }

    public function cargarCheque(){

        $this->validate([

            'banco' => 'required',
            'numero' => 'required',
            'fecha_pago' => 'required',
            'fecha_vencimiento_c' => 'required', 

        ]);

        $cheque = new Cheque;
        $cheque->banco = $this->banco;
        $cheque->numero = $this->numero;
        $cheque->fecha_pago = $this->fecha_pago;
        $cheque->fecha_vencimiento_c = $this->fecha_vencimiento_c;
        $cheque->pagado = $this->pagado;
        $cheque->proveedor_id = $this->proveedorid;
        $cheque->save();
        $this->cheques_aux = true;
        session()->flash('cheque', '¡Los datos del cheque han sido cargados correctamente!');
        return redirect('/proveedores/show/'.$this->proveedorid);


    }


    public function showInfo(){

        $this->activo = "informacion";

    }
    public function showProd(){

        $this->activo = "productos";

    }
    public function showVenci(){
        $this->activo = "vencimientos";
    }
    public function showCheques(){
        $this->activo = "cheques";
    }

    public function eliminarProducto($id){
        Producto::destroy($id);
        session()->flash('productoEliminado', 'El producto fue eliminado correctamente');
    }
    public function eliminarVencimiento($id){
        Vencimiento::destroy($id);
        session()->flash('vencimientoEliminado', 'Los datos del vencimiento fueron eliminados correctamente');
        $this->resetPage();
    }

    public function eliminarCheque($id){
        Cheque::destroy($id);
        session()->flash('chequeEliminado', '¡Los datos del cheque fueron eliminados correctamente!');
        $this->resetPage();
    }

    public function mount(){

        $proveedor = Proveedor::where('id', $this->proveedorid)->get();
        $this->proveedor = $proveedor[0];

        
        $productos = Producto::where('proveedor_id', $this->proveedorid)->get();
        if(empty($productos[0])){
            $this->productos_aux = true;
        }
        
        $cheques =  Cheque::where('proveedor_id', $this->proveedorid)->get();
        if(empty($cheques[0])){
            $this->cheques_aux = true;
        }
        
        $vencimientos = Vencimiento::where('proveedor_id', $this->proveedorid)->get();
        if(empty($vencimientos[0])){
            $this->vencimientos_aux = true;
        }
        

    } 

    public function render()
    {
        return view('livewire.proveedores.show', 
        [
            'productos' => Producto::where('proveedor_id', $this->proveedorid)->paginate(5),
            'cheques' => Cheque::where('proveedor_id', $this->proveedorid)->paginate(5),
            'vencimientos' => Vencimiento::where('proveedor_id', $this->proveedorid)->paginate(5)

            ]);
    }
}
