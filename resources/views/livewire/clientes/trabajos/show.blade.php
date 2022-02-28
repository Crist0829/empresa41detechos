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
        <hr class="m-0 mb-3 -0">
        <div class="row d-flex flex-row justify-content-center mt-0 mb-3">
            <div>
                <ul class="nav nav-pills d-flex flex-row justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'orden_visita' ? 'active' : ''}} vib-t2" wire:click="showOrden">
                            <span class="m-1">Orden de visita</span>
                            <span class="fas fa-list-alt m-1"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'presupuestos' ? 'active' : ''}} vib-t2" wire:click="showPresupuestos">
                            <span class="m-1">Presupuestos</span>
                            <span class="fas fa-money-check-alt m-1"></span>
                        </a>
                    </li>
                    @if(!$activo == "")
                        <li class="nav-item">
                            <a class="nav-link vib-t2" wire:click="noShow">
                                <span class="fas fa-times text-danger"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    <!-- Notificaciones-->
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
        @if(session()->has('techo_actualizado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('techo_actualizado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('techo_cargado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('techo_cargado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('techo_eliminado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('techo_eliminado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('ubicacion_cargada'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('ubicacion_cargada')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('ubicacion_actualizada'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('ubicacion_actualizada')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('presupuestoCargado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('presupuestoCargado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('ubicacion_eliminada'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                    <strong>{{session('ubicacion_eliminada')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        
    <!-- Fin de las notificaciones -->
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
                            <div class="row d-flex flex-row justify-content-center mt-0 mb-3">
                                <div>
                                    <ul class="nav nav-pills d-flex flex-row justify-content-center">
                                        <li class="nav-item">
                                            <a class="nav-link {{$activo2 == 'info_orden' ? 'active' : ''}} vib-t2" wire:click="showInfoOrden">
                                                <span class="m-1">Información</span>
                                                <span class="fas fa-edit m-1"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{$activo2 == 'croquis' ? 'active' : ''}} vib-t2" wire:click="showCroquis">
                                                <span class="m-1">Croquis</span>
                                                <span class="fas fa-image m-1"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{$activo2 == 'emitir_orden' ? 'active' : ''}} vib-t2" wire:click="showEmitirOrden">
                                                <span class="m-1">Emitir</span>
                                                <span class="fas fa-envelope m-1"></span>
                                            </a>
                                        </li>
                                        @if(!$activo2 == "")
                                            <li class="nav-item">
                                                <a class="nav-link vib-t2" wire:click="noShow2">
                                                    <span class="fas fa-times text-danger"></span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            @switch($activo2)
                                @case('info_orden')
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
                                    @break
                                @case('croquis')
                                    @if(empty($orden_visita->croquis_techo) && empty($orden_visita->croquis_ubicacion))
                                        <div class="d-flex flex-column align-items-center">
                                            <div class="alert alert-tertiary alert-dismissible fade show col-md-8 mt-2" role="alert">
                                                <strong>No se ha cargado ningún croquis</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    @endif
                                        <livewire:clientes.trabajos.croquis ordenid="{{$orden_visita->id}}"/>
                                    @break
                                @default
                            @endswitch
                    @endif
                </div>
                @break
            @case("presupuestos")
                <div class="row d-flex flex-column align-items-center">
                    @if(empty($presupuesto_inicial))
                        <div class="d-flex flex-column align-items-center">
                            <div class="alert alert-danger alert-dismissible fade show col-md-8 mt-2" role="alert">
                                <strong>No se han cargado presupuestos para este trabajo...</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                        <div class="row d-flex flex-column align-items-center">
                            <div class="col-md-8">
                                <div class="rounded shadow p-0 pb-3 m-3">
                                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                                        Cargar presupuesto
                                    </h3>
                                    <form wire:submit.prevent="cargarPresupuesto">
                                        <div class="form-group m-3">
                                            <label for="fecha_visita">
                                                Fecha visita
                                            </label>
                                            <input type="date" wire:model.defer="fecha_visita" class="form-control" id="fecha_visita">
                                            @error('fecha_visita') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="logistica">
                                                Logistica
                                            </label>
                                           
                                            <input type="text" wire:model.defer="logistica" 
                                            @error('logistica')
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @enderror
                                            id="logistica">
                                            @error('logistica') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group m-3">
                                            <label for="comision">
                                                Comisión
                                            </label>
                                            <input type="text" wire:model.defer="comision" 
                                            @error('comision')
                                                class="form-control is-invalid"
                                                @else
                                                class="form-control"
                                            @enderror 
                                            id="comision">
                                            @error('comision') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="d-grid gap-2 m-3">
                                            <button class="btn btn-secondary">Cargar presupuesto</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @else
                            <livewire:clientes.trabajos.presupuestos presupuestoid="{{$presupuesto_inicial->id}}"/>
                    @endif
                </div>
                @break
        @endswitch
    </x-card>
</div>