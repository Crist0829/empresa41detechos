<div class="col-md-12">
    <x-card>
        <x-slot name="header_content">
            <div class="d-flex flex-row justify-content-center align-items-center">
                <a href="{{route('clientesIndex')}}" class="btn btn-primary m-2">
                    <span class="fas fa-arrow-left "></span>
                </a>
                <h2 class="text-center m-2">{{$cliente->nombre}}</h2>
                <span class="fas fa-angle-double-right m-2"></span>
                <h2 class="text-center m-2">{{$trabajo->nombre}}</h2>
            </div>
        </x-slot>
        <div class="row d-flex flex-row justify-content-center mt-0 mb-3">
            <div>
                <ul class="nav nav-pills d-flex flex-row justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'orden_visita' ? 'active' : ''}} vib-t2" wire:click="showOrden">Orden de visita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'presupuestos' ? 'active' : ''}} vib-t2" wire:click="showPresupuestos">Presupuestos</a>
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
            @case("orden_visita")
                <div class="row d-flex flex-column align-items-center">
                    @if(empty($orden_visita))
                        <div class="d-flex flex-column align-items-center">
                            <div class="alert alert-danger alert-dismissible fade show col-md-8 mt-2" role="alert">
                                <strong>No hay orden de visita para este trabajo, ¡crea una!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row d-flex flex-column align-items-center">
                            <div class="col-md-8">
                                <div class="rounded shadow p-0 pb-3 m-3">
                                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                                        Cargar orden de visita
                                    </h3>
                                    <form wire:submit.prevent="cargarOrden">
                                        <div class="form-group m-3">
                                            <label for="fecha_orden">
                                                Fecha
                                            </label>
                                            @error('fecha_orden') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="date" wire:model.defer="fecha_orden" class="form-control" id="fecha_orden">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="horario_visita">
                                                Horario de visita
                                            </label>
                                            @error('horario_visita') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model.defer="horario_visita" class="form-control" id ="horario_visita">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="tipo_trabajo">
                                                Tipo de trabajo
                                            </label>
                                            @error('tipo_trabajo') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model.defer="tipo_trabajo" class="form-control" id="tipo_trabajo">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="techo_de">
                                                Techo de
                                            </label>
                                            @error('techo_de') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model.defer="techo_de" class="form-control" id="techo_de">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="alto">
                                                Alto
                                            </label>
                                            @error('alto') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model.defer="alto" class="form-control" id="alto">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="escalera">
                                                ¿Escalera?
                                            </label>
                                            <select wire:model.defer="escalera" id="escalera" class="form-control">
                                                <option value="0" select>No</option>
                                                <option value="1">Sí</option>
                                            </select>
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="contacto">
                                                El contacto fue por
                                            </label>
                                            @error('contacto') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model.defer="contacto" class="form-control" id="contacto">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="observaciones">
                                                Observaciones
                                            </label>
                                            @error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model.defer="observaciones" class="form-control" id="observaciones">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="superficiel_total">
                                                Superficie total
                                            </label>
                                            @error('superficie_total') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model.defer="superficie_total" class="form-control" id="superficiel_total">
                                        </div>              
                                        <div class="form-group m-3">
                                            <label for="metros_cuadrados">
                                                Metros cuadrados
                                            </label>
                                            @error('metros_cuadrados') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model.defer="metros_cuadrados" class="form-control" id="metros_cuadrados">
                                        </div>
                                        <div class="d-grid gap-2 m-3">
                                            <button class="btn btn-secondary">Cargar Orden</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                            
                        <div class="row d-flex flex-column align-items-center">
                            <div class="col-md-8">
                                <div class="rounded shadow p-0 pb-3 m-3">
                                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                                        Ver y actualizar orden
                                    </h3>
                                    <form wire:submit.prevent="actualizarOrden">
                                        <div class="form-group m-3">
                                            <div>
                                                <label for="fecha_orden">
                                                    Fecha
                                                </label>
                                                @error('fecha_orden') <span class="error text-danger">{{ $message }}</span> @enderror
                                                <div class="d-flex flex-row justify-content-baseline">
                                                    <input type="text" class="form-control" id="fecha_orden" placeholder="{{$orden_visita->fecha_orden}}" disabled>
                                                    <div class="m-1">
                                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#update-fecha">
                                                            <span class="fas fa-redo"></span>
                                                        </button>
                                                        <div class="modal fade" id="update-fecha" tabindex="-1" role="dialog" aria-labelledby="update-fecha" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="text-center">Actualizar fecha</h4>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <input type="date" wire:model.defer="fecha_orden" class="form-control" id="fecha_orden">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="actualizarFecha">Actualizar fecha</button>
                                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">cancelar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="horario_visita">
                                                Horario de visita
                                            </label>
                                            @error('horario_visita') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model="horario_visita" class="form-control" id ="horario_visita" placeholder="{{$orden_visita->horario_visita}}">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="tipo_trabajo">
                                                Tipo de trabajo
                                            </label>
                                            @error('tipo_trabajo') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model="tipo_trabajo" class="form-control" id="tipo_trabajo" placeholder="{{$orden_visita->tipo_trabajo}}">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="techo_de">
                                                Techo de
                                            </label>
                                            @error('techo_de') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model="techo_de" class="form-control" id="techo_de"  placeholder="{{$orden_visita->techo_de}}">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="alto">
                                                Alto
                                            </label>
                                            @error('alto') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model="alto" class="form-control" id="alto"  placeholder="{{$orden_visita->alto}}">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="escalera">
                                                ¿Escalera?
                                            </label>
                                            @if(!$orden_visita->escalera)
                                                    <select wire:model="escalera" id="escalera" class="form-control">
                                                        <option value="0" selected>No</option>
                                                        <option value="1">Sí</option>
                                                    </select>
                                                @else
                                                    <select wire:model="escalera" id="escalera" class="form-control">
                                                        <option value="1" selected>Sí</option>
                                                        <option value="0">No</option>
                                                    </select>
                                            @endif
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="contacto">
                                                El contacto fue por
                                            </label>
                                            @error('contacto') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model="contacto" class="form-control" id="contacto" placeholder="{{$orden_visita->alto}}">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="observaciones">
                                                Observaciones
                                            </label>
                                            @error('observaciones') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model="observaciones" class="form-control" id="observaciones" placeholder="{{$orden_visita->observaciones}}">
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="superficiel_total">
                                                Superficie total
                                            </label>
                                            @error('superficie_total') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model="superficie_total" class="form-control" id="superficiel_total" placeholder="{{$orden_visita->superficie_total}}">
                                        </div>              
                                        <div class="form-group m-3">
                                            <label for="metros_cuadrados">
                                                Metros cuadrados
                                            </label>
                                            @error('metros_cuadrados') <span class="error text-danger">{{ $message }}</span> @enderror
                                            <input type="text" wire:model="metros_cuadrados" class="form-control" id="metros_cuadrados" placeholder="{{$orden_visita->metros_cuadrados}}">
                                        </div>
                                        <div class="d-grid gap-2 m-3">
                                            <button class="btn btn-secondary">Actualizar datos</button>
                                        </div>
                                        @if(session()->has('sinActualizacion'))
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                                                    <strong>{{session('sinActualizacion')}}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        @endif
                                        @if(session()->has('actualizado'))
                                            <div class="d-flex flex-column align-items-center">
                                                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                                                    <strong>{{session('actualizado')}}</strong>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @break
            @case("presupuestos")
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