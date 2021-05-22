<div class="col-md-8">
    <div class="rounded shadow p-0 pb-3 m-3">
        <h3 class="bg-dark text-white text-center m-0 rounded-top">
            Cargar Trabajo
        </h3>
        <form wire:submit.prevent="cargarTrabajo">
            <div class="form-group m-3">
                @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                <input type="text" wire:model="nombre" class="form-control" placeholder="Nombre">
            </div>
            <div class="form-group m-3">
                <label for="fecha">Fecha</label>
                @error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                <input type="date" wire:model="fecha" class="form-control" id="fecha">
            </div>
            <div class="d-grid gap-2 m-3">
                <button class="btn btn-secondary">Cargar trabajo</button>
            </div>
        </form>
    </div>
</div>