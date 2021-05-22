<div class="col-md-12">
    <x-card>
        <x-slot name="header_content">
            <div class="d-flex flex-row justify-content-center">
                <a href="{{route('clientesIndex')}}" class="btn btn-primary m-2">
                    <span class="fas fa-arrow-left"></span>
                </a>
                <h2 class="text-center m-2">{{$cliente->nombre}}</h2>
            </div>
        </x-slot>
        <div class="row d-flex flex-row justify-content-center mt-0 mb-3">
            <div>
                <ul class="nav nav-pills d-flex flex-row justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'informacion' ? 'active' : ''}} vib-t2" wire:click="showInfo">Información</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'trabajos' ? 'active' : ''}} vib-t2" wire:click="showTraba">Trabajos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link vib-t2" wire:click="noShow">
                            <span class="fas fa-arrow-down"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @if(session()->has('cargado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('cargado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('eliminado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('eliminado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @switch($activo)
            @case("informacion")
                <div class="row d-flex flex-column align-items-center">
                    <div class="col-md-8">
                        <div class="rounded shadow p-0 pb-3 m-3">
                            <h3 class="bg-dark text-white text-center m-0 rounded-top">
                                Actualizar información
                            </h3>
                            <form wire:submit.prevent="updateInfo">
                                <div class="form-group m-3">
                                    @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="text" wire:model="nombre" class="form-control" placeholder="{{$cliente->nombre}}">
                                </div>
                                <div class="form-group m-3">
                                    @error('documento') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="text" wire:model="documento" class="form-control" placeholder="{{$cliente->documento}}">
                                </div>
                                <div class="form-group m-3">
                                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="email" wire:model="email" class="form-control" placeholder="{{$cliente->email}}">
                                </div>
                                <div class="form-group m-3">
                                    @error('telefono') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="text" wire:model="telefono" class="form-control" placeholder="{{$cliente->telefono}}">
                                </div>
                                <div class="form-group m-3">
                                    @error('direccion') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="text" wire:model="direccion" class="form-control" placeholder="{{$cliente->direccion}}">
                                </div>
                                <div class="form-group m-3">
                                    <label for="fecha">
                                        Fecha
                                    </label>
                                    @error('fecha') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="date" wire:model="fecha" class="form-control" id="fecha">
                                </div>
                                <div class="d-grid gap-2 m-3">
                                    <button class="btn btn-secondary">Actualizar datos</button>
                                </div>
                            </form>
                            @if(session()->has('actualizado'))
                                <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                                    <strong>{{session('actualizado')}}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        </div>
                    </div>
                    @endif
                </div>
                @break
            @case("trabajos")
                <div class="row d-flex flex-column align-items-center">
                @if (empty($trabajos[0]))
                <div class="col-md-8">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Nada para mostrar...</strong>Por favor, cargue un trabajo para este cliente.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                </div>
                    @else
                    <div class="col-md-12">
                        <div class="table-responsive shadow rounded m-3">
                                    <table class="table table-centered table-nowrap mb-0 rounded">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="border-0 text-center text-secondary">Nombre</th>
                                                <th class="border-0 text-center">fecha</th>
                                                <th class="border-0 text-center text-secondary">¿Finalizado?</th>
                                                <th class="border-0 text-center">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($trabajos as $trabajo)
                                            <tr>
                                                <td><p class="text-center bg-secondary rounded p-1 fw-bold shadow-sm mt-1">{{$trabajo->nombre}}</p></td>
                                                <td><p class="text-center text-white bg-dark rounded shadow-sm p-1 mt-1 fw-bold">{{$trabajo->fecha}}</p></td>
                                                <td>
                                                    @if ($trabajo->finalizado)
                                                    <p class="text-center text-white bg-tertiary rounded p-1 fw-bold shadow-sm mt-1">Sí</p>
                                                        @else
                                                    <p class="text-center text-white bg-danger rounded p-1 fw-bold shadow-sm mt-1">No</p>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="d-flex flex-row justify-content-center">
                                                        <a href="{{route('trabaShow', $trabajo->id)}}" class="btn btn-outline-primary m-1 mt-0">
                                                            <span class="fas fa-eye"></span>
                                                        </a>
                                                        <button type="button" class="btn btn-outline-primary m-1 mt-0" data-bs-toggle="modal" data-bs-target="{{"#".str_replace(" ", '_', $trabajo->nombre)}}">
                                                            <span class="fas fa-trash text-danger"></span>
                                                        </button>
                                                        @if(!$trabajo->finalizado)
                                                            <a wire:click="finalizarTrabajo({{$trabajo->id}})" class="btn btn-outline-tertiary m-1 mt-0">
                                                                <span class="fas fa-check"></span>
                                                            </a>
                                                            @else
                                                            <a wire:click="noFinalizarTrabajo({{$trabajo->id}})" class="btn btn-outline-danger m-1 mt-0">
                                                                <span class="fas fa-times"></span>
                                                            </a>
                                                        @endif
                                                        <div class="modal fade" id={{str_replace(" ", '_', $trabajo->nombre)}} tabindex="-1" role="dialog" aria-labelledby={{str_replace(" ", '_', $trabajo->nombre)}} aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h2 class="text-center text-danger">Eliminar elemento</h2>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                         <p class="text-center">¿Estás seguro que deseas eliminar <strong class="text-danger">{{$trabajo->nombre}}</strong>?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" wire:click="eliminarTrabajo({{$trabajo->id}})" data-bs-dismiss="modal">Aceptar</button>
                                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                          @endforeach
                                        </tbody>
                                    </table>
                        </div>
                        <div class="d-flex flex-column align-items-center mt-3">
                            {{$trabajos->links()}}
                        </div>
                    </div>
                @endif
                <livewire:clientes.trabajoc idcliente={{$clienteid}}/>
                </div>
                @break
        @endswitch
        
    </x-card>
</div>