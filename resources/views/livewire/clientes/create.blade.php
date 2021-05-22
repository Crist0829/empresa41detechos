<div class="col-md-12">
    <x-card>
        <x-slot name="title">
            Cargar cliente
        </x-slot>
        <div class="d-flex flex-column align-items-center">
            <div class="col-md-8 shadow rounded p-1">
                <form wire:submit.prevent="cargarCliente">
                    <div class="form-group m-3 p-1">
                        <input type="text" wire:model="nombre" class="form-control" placeholder="Nombre y apellido o razón social">
                        @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-3 p-1">
                        <input type="text" wire:model="documento" class="form-control" placeholder="DNI o Cuit">
                        @error('codigo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-3 p-1">
                        <input type="text" wire:model="email" class="form-control" placeholder="Email">
                        @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-3 p-1">
                        <input type="text" wire:model="telefono" class="form-control" placeholder="telefono">
                        @error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-3 p-1">
                        <input type="text" wire:model="direccion" class="form-control" placeholder="Dirección">
                        @error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-3 p-1">
                        <label for="fecha">Fecha</label>
                        <input type="date" wire:model="fecha" class="form-control" id="fecha">
                        @error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group m-3 p-1">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-secondary btn">Cargar cliente</button>
                        </div>
                    </div>
                    @if (session()->has('cliente'))
                    <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                        <strong>{{session('cliente')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </x-card>
</div>
