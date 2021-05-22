<div class="col-md-12">
    <x-card>
        <x-slot name="title">
            INGRESO DE MERCADERÍA
        </x-slot>
        <div class="d-flex flex-column align-items-center">
            <div class="col-md-8 shadow rounded p-1">
                <form wire:submit.prevent="submit">
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="nombre" class="form-control" placeholder="Nombre">
                        @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="codigo" class="form-control" placeholder="Código">
                        @error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="medida" class="form-control" placeholder="Medida">
                        @error('medida') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="cantidad" class="form-control" placeholder="Cantidad">
                        @error('cantidad') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="precio_costo" class="form-control" placeholder="Precio de costo">
                        @error('precio_costo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="precio_venta" class="form-control" placeholder="Precio de venta">
                        @error('precio_venta') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <input type="text" wire:model="stock_minimo" class="form-control" placeholder="Stock Mínimo">
                        @error('stock_minimo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-1 p-1">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-secondary btn">Guardar</button>
                        </div>
                    </div>
                    @if(session()->has('agregado'))
                    <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                        <strong>{{session('agregado')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                </form>
            </div>
        </div>
    </x-card>
</div>
