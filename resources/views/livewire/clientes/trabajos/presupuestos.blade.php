<div class="row d-flex flex-column align-items-center">

    <div class="row d-flex flex-row justify-content-center mt-0 mb-3">
        <div>
            <ul class="nav nav-pills d-flex flex-row justify-content-center">
                <li class="nav-item">
                    <a class="nav-link {{$activo == 'presupuesto_inicial' ? 'active' : ''}} vib-t2" wire:click="showInicial">
                        <span class="m-1">Presupuesto incial</span>
                        <span class="fas fa-money-check-alt m-1"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$activo == 'presupuesto_final' ? 'active' : ''}} vib-t2" wire:click="showFinal">
                        <span class="m-1">Presupuesto final</span>
                        <span class="fas fa-money-check-alt m-1"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$activo == 'comparacion' ? 'active' : ''}} vib-t2" wire:click="showComparacion">
                        <span class="m-1">Comparación</span>
                        <span class="fas fa-equals"></span>
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

    @switch($activo)
        @case('presupuesto_inicial')
        <div class="row d-flex flex-row justify-content-center mt-0 mb-3">
            <div>
                <ul class="nav nav-pills d-flex flex-row justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link {{$activo2 == 'info_presupuesto' ? 'active' : ''}} vib-t2" wire:click="showInfoPre">
                            <span class="m-2">Informacion</span>
                            <span class="fas fa-edit m-2"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$activo2 == 'material' ? 'active' : ''}} vib-t2" wire:click="showMaterial">
                            <span class="m-1">Material</span>
                            <span class="fas fa-layer-group m-1"></span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$activo2 == 'mano_obra' ? 'active' : ''}} vib-t2" wire:click="showMano">
                            <span class="m-1">Mano de obra</span>
                            <span class="fas fa-hand-paper"></span>
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
            @case('info_presupuesto')
                <div class="col-md-8">
                    <div class="rounded shadow p-0 pb-3 m-3">
                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                        Información
                    </h3>
                    <form wire:submit.prevent="actualizarPresupuesto">
                        <div class="form-group m-3">
                            <div>
                                <label for="fecha_visita">
                                    Fecha
                                </label>
                                <div class="d-flex flex-row justify-content-baseline">
                                    <input type="text" class="form-control" id="fecha_vista" placeholder="{{$presupuesto_inicial->fecha_visita}}" disabled>
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
                                                        <input type="date" wire:model.defer="fecha_visita" class="form-control" id="fecha_visita">
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
                            <label for="logistica">
                                Logistica
                            </label>
                            <input type="text" wire:model="logistica" class="form-control" id ="logistica" placeholder="{{$presupuesto_inicial->logistica}}">
                            @error('logistica') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="form-group m-3">
                            <label for="comision">
                                Comisión
                            </label>
                            <input type="text" wire:model="comision" class="form-control" id ="comision" placeholder="{{$presupuesto_inicial->comision}}">
                            @error('comision') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group m-3">
                            <label for="precio_total">
                                Precio total
                            </label>
                            <input type="text" wire:model="precio_total" class="form-control" id ="precio_total" placeholder="{{$presupuesto_inicial->precio_total}}">
                            @error('precio_total') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="d-grid gap-2 m-3">
                            <button class="btn btn-secondary">Actualizar datos</button>
                        </div>

                        @if(session()->has('noPresupuestoAct'))
                            <div class="d-flex flex-column align-items-center m-3">
                                <div class="alert alert-danger alert-dismissible fade show col-md-12 m-2" role="alert">
                                    <strong>{{session('noPresupuestoAct')}}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                        @if(session()->has('presupuestoAct'))
                            <div class="d-flex flex-column align-items-center m-3">
                                <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                                    <strong>{{session('presupuestoAct')}}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        @endif
                    </form>
                    </div>
                </div>
                @break
            @case('material')
                <div class="col-md-8">
                    <div class="rounded shadow p-0 pb-3 m-3">
                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                        Material 
                    </h3>
                    </div>
                </div>
                @break
            @case('mano_obra')
                
                @break

            @default
                
        @endswitch

        

        


        <div></div>

            @break
        @case('presupuesto_final')
            <h1>Aquí va el presupuesto final</h1>
            @break

         @case('comparacion')
            <h1>Aquí va la comparacion</h1>
            @break

        @default
            
    @endswitch

    
</div>
