<div class="col-md-12">
    <x-card>
        <x-slot name="header_content">
            <div class="d-flex flex-row justify-content-center">
                <a href="{{route('stock')}}" class="btn btn-secondary m-2">
                    <span class="fas fa-arrow-left"></span>
                </a>
                <h2 class="text-center m-2">{{$articulo->nombre}}</h2>
            </div>
        </x-slot>
        <div class="row d-flex flex-column align-items-center">
            <div class="rounded shadow col-md-8 mt-3 p-0">
                <h3 class="text-center bg-dark m-0 text-white rounded-top p-1">Actualizar datos</h3>
                <form wire:submit.prevent="update" class="m-2">
                    <div class="form-group m-1 d-flex flex-row align-items-baseline">
                        <label for="codigo">Nombre: </label>
                        <input type="text" wire:model = 'nombre' class="form-control m-2" id='codigo' placeholder={{$articulo->nombre}}>
                    </div>
                    <div class="form-group m-1 d-flex flex-row align-items-baseline">

                        <label for="codigo">Código: </label>
                        <input type="text" wire:model = 'codigo' class="form-control m-2" id='codigo' placeholder={{$articulo->codigo}}>
                    </div>
                    <div class="form-group m-1 d-flex flex-row align-items-baseline">
                        <label for="medida">Medida: </label>
                        <input type="text" wire:model = 'medida' class="form-control m-2" id='medida' placeholder={{$articulo->medida}}>
                    </div>
                    <div class="form-group m-1 d-flex flex-row align-items-baseline">
                        <label for="cantidad">Cantidad: </label>
                        <input type="text" wire:model = 'cantidad' class="form-control m-2" id='cantidad' placeholder={{$articulo->cantidad}}>
                    </div>
                    <div class="form-group m-1 d-flex flex-row align-items-center">
                        <label for="precio_costo">Precio de costo: </label>
                        <input type="text" wire:model = 'precio_costo' class="form-control m-2" id='precio_costo' placeholder={{$articulo->precio_costo}}>
                    </div>
                    <div class="form-group m-1 d-flex flex-row align-items-center">
                        <label for="precio_venta">Precio de venta: </label>
                        <input type="text" wire:model = 'precio_venta' class="form-control m-2" id='precio_venta' placeholder={{$articulo->precio_venta}}>
                    </div>
                    <div class="form-group m-1 d-flex flex-row align-items-center">
                        <label for="minimo">Stock mínimo: </label>
                        <input type="text" wire:model = 'stock_minimo' class="form-control m-2" id='minimo' placeholder={{$articulo->stock_minimo}}>
                    </div>
                    <div class="d-grid gap-2 mt-3 mb-3">
                        <button class="btn btn-secondary">Actualizar</button>
                    </div>
                    @if(session()->has('actualizado'))
                    <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                        <strong class="text-center">{{session('actualizado')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center mt-5">
            <div class="rounded shadow col-md-8 mt-3">
                <h3 class="text-center bg-dark m-0 p-1 rounded-top text-white">Eliminar</h3>
                <div class="m-3 d-flex flex-column align-items-center">
                    <button class="btn btn-danger" wire:click="eliminar">Eliminar articulo</button>
                </div>
            </div>
        </div>
    </x-card>
</div>
