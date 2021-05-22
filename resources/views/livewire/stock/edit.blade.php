<div class="col-md-12">
    <x-card>
        <x-slot name="title">
            <h3 class="text-center">EGRESO DE MERCADERÍA</h3>
        </x-slot>
        @if(session()->has('mensaje'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
                    <strong>{{session('mensaje')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="d-flex flex-column align-items-center">
            <div class="col-md-8 shadow rounded p-1">
                <form wire:submit.prevent="mostrarArticulo" class="mt-2">
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="codigo" class="form-control" placeholder="Código del artículo">
                        @error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="cantidad" class="form-control" placeholder="Cantidad a descontar">
                        @error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-secondary btn">Continuar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (!empty($articulo))
        <div class="d-flex flex-column align-items-center mt-3">
            <div class="col-md-8 shadow rounded">
                <h3 class="bg-dark text-center text-white m-0 rounded-top">{{$articulo->nombre}}</h3>
                <div class="d-flex flex-column align-items-center">
                    <div class="d-flex flex-column align-items-start">
                        <p class="m-2 mt-3">Nombre: <strong>{{$articulo->nombre}}</strong></p>
                        <p class="m-2 mt-0">Cantidad diponible: <strong>{{$articulo->cantidad}}</strong></p>
                        <p class="m-2 mt-0">medida: <strong>{{$articulo->medida}}</strong></p>
                        <p class="m-2 mt-0">Precio de venta: <strong>{{$articulo->precio_venta}}</strong></p>
                    </div>
                </div>
                <div class="d-flex flex-column align-items-end m-2">
                    <button class="btn btn-secondary" wire:click='egreso'>Egreso</button>
                </div>
            </div>
            @if(session()->has('egreso'))
                <div class="alert alert-tertiary alert-dismissible fade show mt-3 col-md-8" role="alert">
                    <strong>{{session('egreso')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('cantidad'))
            <div class="alert alert-danger alert-dismissible fade show mt-3 col-md-8" role="alert">
                <strong>{{session('cantidad')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        </div>
        @endif
    </x-card>
</div>