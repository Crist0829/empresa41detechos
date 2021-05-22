<x-card>
    <x-slot name="title">
        {{$usuario->name}}
    </x-slot>
    <x-slot name="header_content">
        @if ($usuario->profile_photo_path == null)

        <figure class="m-1">
            <img src="{{asset('assets/img/users/default.png')}}" alt="users-profile-photo" width="150">
        </figure>

        @else
        <figure class="m-1">
            <img src="{{$usuario->profile_photo_path}}" alt="users-profile-photo" width="150">
        </figure>
    @endif
    </x-slot>
    <div class="row d-flex flex-column align-items-center">
        <div class="col-md-8">
            <h5 class="m-0 mt-3">Email: <strong class="text-tertiary">{{$usuario->email}}</strong></h5>
            <h5 class="m-0 mt-2">Rol: 
                <strong class="text-tertiary">
                    @switch($usuario->rol)
                        @case('propietario')
                            <strong class="text-danger">Propietario</strong>
                            @break
                        @case('empleado')
                            <strong class="text-primary">Empleado</strong>
                            @break
                        @default
                        <strong class="text-tertiary">Cliente</strong> 
                    @endswitch
                </strong>
            </h5>
            <div class="rounded mt-3 mb-3 shadow">
                <h4 class="m-0 bg-dark text-white text-center rounded-top">Cambiar rol</h4>
            <form wire:submit.prevent="cambiarRol" class="m-3">
                        <div class="form-group">
                            <select class="form-control" wire:model="rol">
                                @switch($usuario->rol)
                                    @case('propietario')
                                        <option value="propietario">Propietario</option>
                                        <option value="empleado">Empleado</option>
                                        <option value="cliente">Cliente</option>
                                        @break
                                    @case('empleado')
                                        <option value="empleado">Empleado</option>
                                        <option value="propietario">Propietario</option>
                                        <option value="cliente">Cliente</option>
                                        @break
                                    @case('cliente')
                                        <option value="cliente">Cliente</option>
                                        <option value="empleado">Empleado</option>
                                        <option value="propietario">Propietario</option>
                                        @break
                                @endswitch
                            </select>
                            <button class="btn btn-success btn-sm mt-3">Guardar</button>
                            <div class="d-flex flex-column justify-content-center m-2">
                                <div wire:loading>
                                    <div class="spinner-border text-secondary" role="status">
                                    </div>
                                </div>
                            </div>
                        </div>
            </form>
            </div>
        </div>
    </div>
</x-card>