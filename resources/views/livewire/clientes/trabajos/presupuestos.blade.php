<div class="row d-flex flex-column align-items-center">

    @if(session()->has('presupuesCargado'))
        <div class="d-flex flex-column align-items-center m-3">
            <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                <strong>{{session('presupuestoRealCargado')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

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
                    <a class="nav-link {{$activo == 'emitir_presupuesto' ? 'active' : ''}} vib-t2" wire:click="showEmitirPresupuesto">
                        <span class="m-1">Emitir presupuesto</span>
                        <span class="fas fa-list-alt m-1"></span>
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

         <!-- Notificaciones presupuesto inicial-->
        @if(session()->has('material_cargado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                    <strong>{{session('material_cargado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('material_no_cargado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-danger alert-dismissible fade show col-md-12 mt-2" role="alert">
                    <strong>{{session('material_no_cargado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('material_eliminado'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                    <strong>{{session('material_eliminado')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('mano_obra'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                    <strong>{{session('mano_obra')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        @if(session()->has('mano_obra_eliminada'))
            <div class="d-flex flex-column align-items-center">
                <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                    <strong>{{session('mano_obra_eliminada')}}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <!-- Fin de las notificaciones-->


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
                @if(empty($material[0]->id))
                    <div class="d-flex flex-column align-items-center m-3">
                        <div class="alert alert-danger alert-dismissible fade show col-md-12 mt-2" role="alert">
                            <strong>No se ha cargado material</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @else
                    <!-- Material -->
                    <h3 class="text-center m-3">
                        Material cargado
                    </h3>
                    <div class="table-responsive shadow rounded">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="border-0 text-center text-secondary">Nombre</th>
                                    <th class="border-0 text-center">Código</th>
                                    <th class="border-0 text-center">Cantidad</th>
                                    <th class="border-0 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($material as $material)
                                <tr>
                                    <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm"><strong>{{$material->nombre}}</strong> </p></td>
                                    <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$material->codigo_producto}}</p></td>
                                    <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$material->cantidad}}</p></td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <button wire:click="borrarMaterial({{$material->id}})" target="_blank" class="btn btn-outline-primary m-1 mt-0">
                                                <span class="fas fa-trash text-danger"></span>
                                            </button>
                                            <button type="button" class="btn btn-outline-primary m-1 mt-0" data-bs-toggle="modal" data-bs-target="{{"#".str_replace(" ", '_', $material->nombre)}}">
                                                <span class="fas fa-edit"></span>
                                            </button>
                                            <div class="modal fade" id={{str_replace(" ", '_', $material->nombre)}} tabindex="-1" role="dialog" aria-labelledby={{str_replace(" ", '_', $material->nombre)}} aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="d-flex flex-column">
                                                                <h2 class="text-center">Modificar cantidad</h2>
                                                                <h4 class="text-center">{{$material->nombre}}</h4>
                                                            </div>
                                                            
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for ="cantidad">
                                                                    Elegir cantidad
                                                                </label>
                                                                <input type="number" wire:model.defer="cantidad" class="form-control" id="cantidad" placeholder="0">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" wire:click="modificarArticulo({{$material->id}})" data-bs-dismiss="modal">Aceptar</button>
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
                    <!-- Fin Material -->
                @endif

                <!-- Articulos -material a cargar -->
                <div class="col-md-12">

                    <h3 class="text-center m-3">
                        Cargar Material
                    </h3>
                
                    <form wire:submit.prevent="updatingSearch" class="m-3">
                            <div class="form-group">
                                <input class="form-control" type="text" wire:model='search' placeholder="Buscar material en el stock">
                            </div>
                    </form>
                
                    @if(empty($stocks[0]))
                    @if(session()->has('no_articulos'))
                        <div class="alert alert-danger alert-dismissible fade show m-3 mt-0" role="alert">
                            <strong>{{session('no_articulos')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @else
                        <div class="alert alert-danger alert-dismissible fade show m-3 mt-0" role="alert">
                            <strong>¡No se han agregado artículos al stock!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @else
                    <div class="table-responsive shadow rounded">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="border-0 text-center text-secondary">Nombre</th>
                                    <th class="border-0 text-center">Código</th>
                                    <th class="border-0 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($stocks as $stock)
                                <tr>
                                    <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm"><strong>{{$stock->nombre}}</strong> </p></td>
                                    <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$stock->codigo}}</p></td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <a href="{{route('stockShow', $stock->id)}}" target="_blank" class="btn btn-outline-primary m-1 mt-0">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                            <button type="button" class="btn btn-outline-primary m-1 mt-0" data-bs-toggle="modal" data-bs-target="{{"#".str_replace(" ", '_', $stock->nombre)}}">
                                                <span class="fas fa-plus"></span>
                                            </button>
                                            <div class="modal fade" id={{str_replace(" ", '_', $stock->nombre)}} tabindex="-1" role="dialog" aria-labelledby={{str_replace(" ", '_', $stock->nombre)}} aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="d-flex flex-column">
                                                                <h2 class="text-center">Cargar Artículo</h2>
                                                                <h4 class="text-center">{{$stock->nombre}}</h4>
                                                            </div>
                                                            
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for ="cantidad">
                                                                    Elegir cantidad
                                                                </label>
                                                                <input type="number" wire:model.defer="cantidad" class="form-control" id="cantidad" placeholder="0">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary" wire:click="agregarArticulo({{$stock->id}})" data-bs-dismiss="modal">Aceptar</button>
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
                        {{$stocks->links()}}
                    </div>
                @endif
                </div>
                <!-- Fin Articulos -->
                @break

            @case('mano_obra')
                @if(empty($mano_obra[0]->id))
                    <div class="d-flex flex-column align-items-center m-3">
                        <div class="alert alert-danger alert-dismissible fade show col-md-12 mt-2" role="alert">
                            <strong>No se ha cargado información de la mano de obra</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @else
                         <!-- Mano de obra cargada -->
                        <h3 class="text-center m-3">
                            Mano de obra cargada
                        </h3>
                        <div class="table-responsive shadow rounded">
                            <table class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="border-0 text-center text-secondary">Tipo de trabajo</th>
                                        <th class="border-0 text-center">Precio por metros cuadrados</th>
                                        <th class="border-0 text-center">Fecha</th>
                                        <th class="border-0 text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($mano_obra as $mano)
                                    <tr>
                                        <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm"><strong>{{$mano->tipo_trabajo}}</strong> </p></td>
                                        <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$mano->precio_metro_cuadrado}}</p></td>
                                        <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$mano->fecha_mano}}</p></td>
                                        <td>
                                            <div class="d-flex flex-row justify-content-center">
                                                <button wire:click="borrarManoObra({{$mano->id}})" target="_blank" class="btn btn-outline-primary m-1 mt-0">
                                                    <span class="fas fa-trash text-danger"></span>
                                                </button>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    <!-- Fin Mano de obra cargada -->

                @endif

                <div class="row d-flex flex-column align-items-center">
                    <div class="col-md-8">
                        <div class="rounded shadow p-0 pb-3 m-3">
                            <h3 class="bg-dark text-white text-center m-0 rounded-top">
                               Cargar Mano de obra
                            </h3>
                            <form wire:submit.prevent="cargarManoObra">
                                
                                <div class="form-group m-3">
                                    <label for="tipo_trabajo">
                                        Tipo de trabajo
                                    </label>
                                   
                                    <input type="text" wire:model.defer="tipo_trabajo" 
                                    @error('tipo_trabajo')
                                        class="form-control is-invalid"
                                        @else
                                        class="form-control"
                                    @enderror
                                    id="tipo_trabajo">
                                    @error('tipo_trabajo') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group m-3">
                                    <label for="precio_metro_cuadrado">
                                        Precio por metros cuadrados
                                    </label>
                                    <input type="text" wire:model.defer="precio_metro_cuadrado" 
                                    @error('precio_metro_cuadrado')
                                        class="form-control is-invalid"
                                        @else
                                        class="form-control"
                                    @enderror 
                                    id="precio_metro_cuadrado">
                                    @error('precio_metro_cuadrado') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group m-3">
                                    <label for="fecha_mano">
                                        Fecha
                                    </label>
                                    <input type="date" wire:model.defer="fecha_mano" 
                                    @error('fecha_mano')
                                        class="form-control is-invalid"
                                        @else
                                        class="form-control"
                                    @enderror 
                                    id="fecha_mano">
                                    @error('fecha_mano') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="d-grid gap-2 m-3">
                                    <button class="btn btn-secondary">Cargar mano de obra</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                @break

            @default
                
        @endswitch
            @break

            
        @case('presupuesto_final')
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

            <!-- Notificaciones presupuesto inicial-->
            @if(session()->has('material_cargado'))
                <div class="d-flex flex-column align-items-center">
                    <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                        <strong>{{session('material_cargado')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if(session()->has('material_no_cargado'))
                <div class="d-flex flex-column align-items-center">
                    <div class="alert alert-danger alert-dismissible fade show col-md-12 mt-2" role="alert">
                        <strong>{{session('material_no_cargado')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if(session()->has('material_eliminado'))
                <div class="d-flex flex-column align-items-center">
                    <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                        <strong>{{session('material_eliminado')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if(session()->has('mano_obra'))
                <div class="d-flex flex-column align-items-center">
                    <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                        <strong>{{session('mano_obra')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            @if(session()->has('mano_obra_eliminada'))
                <div class="d-flex flex-column align-items-center">
                    <div class="alert alert-tertiary alert-dismissible fade show col-md-12 mt-2" role="alert">
                        <strong>{{session('mano_obra_eliminada')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
    <!-- Fin de las notificaciones-->

        @switch($activo2)
        @case('info_presupuesto')
                <div class="col-md-8">
                    <div class="rounded shadow p-0 pb-3 m-3">
                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                        Información blo blu
                    </h3>
                    <form wire:submit.prevent="actualizarPresupuestoReal">
                        <div class="form-group m-3">
                            <div>
                                <label for="fecha_visita_real">
                                    Fecha de visita
                                </label>
                                <div class="d-flex flex-row justify-content-baseline">
                                    <input type="text" class="form-control" id="fecha_vista_real" placeholder="{{$presupuesto_real->fecha_visita}}" disabled>
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
                                                        <input type="date" wire:model.defer="fecha_visita_real" class="form-control" id="fecha_visita_real">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="actualizarFechaReal">Actualizar fecha</button>
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
                            <label for="logistica_real">
                                Logistica
                            </label>
                            <input type="text" wire:model="logistica_real" class="form-control" id ="logistica_real" placeholder="{{$presupuesto_real->logistica}}">
                            @error('logistica_real') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    
                        <div class="form-group m-3">
                            <label for="comision_real">
                                Comisión
                            </label>
                            <input type="text" wire:model="comision_real" class="form-control" id ="comision_real" placeholder="{{$presupuesto_real->comision}}">
                            @error('comision_real') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group m-3">
                            <label for="precio_total_real">
                                Precio total
                            </label>
                            <input type="text" wire:model="precio_total_real" class="form-control" id ="precio_total_real" placeholder="{{$presupuesto_real->precio_total}}">
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
            @if(empty($material_real[0]->id))
                <div class="d-flex flex-column align-items-center m-3">
                    <div class="alert alert-danger alert-dismissible fade show col-md-12 mt-2" role="alert">
                        <strong>No se ha cargado material</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @else
                <!-- Material -->
                <h3 class="text-center m-3">
                    Material cargado
                </h3>
                <div class="table-responsive shadow rounded">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th class="border-0 text-center text-secondary">Nombre</th>
                                <th class="border-0 text-center">Código</th>
                                <th class="border-0 text-center">Cantidad</th>
                                <th class="border-0 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($material_real as $material)
                            <tr>
                                <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm"><strong>{{$material->nombre}}</strong> </p></td>
                                <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$material->codigo_producto}}</p></td>
                                <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$material->cantidad}}</p></td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center">
                                        <button wire:click="borrarMaterialReal({{$material->id}})" target="_blank" class="btn btn-outline-primary m-1 mt-0">
                                            <span class="fas fa-trash text-danger"></span>
                                        </button>
                                        <button type="button" class="btn btn-outline-primary m-1 mt-0" data-bs-toggle="modal" data-bs-target="{{"#".str_replace(" ", '_', $material->nombre)}}">
                                            <span class="fas fa-edit"></span>
                                        </button>
                                        <div class="modal fade" id={{str_replace(" ", '_', $material->nombre)}} tabindex="-1" role="dialog" aria-labelledby={{str_replace(" ", '_', $material->nombre)}} aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="d-flex flex-column">
                                                            <h2 class="text-center">Modificar cantidad</h2>
                                                            <h4 class="text-center">{{$material->nombre}}</h4>
                                                        </div>
                                                        
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for ="cantidad">
                                                                Elegir cantidad
                                                            </label>
                                                            <input type="number" wire:model.defer="cantidad_real" class="form-control" id="cantidad" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" wire:click="modificarArticuloReal({{$material->id}})" data-bs-dismiss="modal">Aceptar</button>
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
                <!-- Fin Material -->
            @endif

            <!-- Articulos -material a cargar -->
            <div class="col-md-12">

                <h3 class="text-center m-3">
                    Cargar Material
                </h3>
            
                <form wire:submit.prevent="updatingSearch" class="m-3">
                        <div class="form-group">
                            <input class="form-control" type="text" wire:model='search' placeholder="Buscar material en el stock">
                        </div>
                </form>
            
                @if(empty($stocks[0]))
                @if(session()->has('no_articulos'))
                    <div class="alert alert-danger alert-dismissible fade show m-3 mt-0" role="alert">
                        <strong>{{session('no_articulos')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @else
                    <div class="alert alert-danger alert-dismissible fade show m-3 mt-0" role="alert">
                        <strong>¡No se han agregado artículos al stock!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @else
                <div class="table-responsive shadow rounded">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th class="border-0 text-center text-secondary">Nombre</th>
                                <th class="border-0 text-center">Código</th>
                                <th class="border-0 text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($stocks as $stock)
                            <tr>
                                <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm"><strong>{{$stock->nombre}}</strong> </p></td>
                                <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$stock->codigo}}</p></td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center">
                                        <a href="{{route('stockShow', $stock->id)}}" target="_blank" class="btn btn-outline-primary m-1 mt-0">
                                            <span class="fas fa-eye"></span>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary m-1 mt-0" data-bs-toggle="modal" data-bs-target="{{"#".str_replace(" ", '_', $stock->nombre)}}">
                                            <span class="fas fa-plus"></span>
                                        </button>
                                        <div class="modal fade" id={{str_replace(" ", '_', $stock->nombre)}} tabindex="-1" role="dialog" aria-labelledby={{str_replace(" ", '_', $stock->nombre)}} aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="d-flex flex-column">
                                                            <h2 class="text-center">Cargar Artículo</h2>
                                                            <h4 class="text-center">{{$stock->nombre}}</h4>
                                                        </div>
                                                        
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for ="cantidad">
                                                                Elegir cantidad
                                                            </label>
                                                            <input type="number" wire:model.defer="cantidad_real" class="form-control" id="cantidad" placeholder="0">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary" wire:click="agregarArticuloReal({{$stock->id}})" data-bs-dismiss="modal">Aceptar</button>
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
                    {{$stocks->links()}}
                </div>
            @endif
            </div>
            <!-- Fin Articulos -->
            @break

        @case('mano_obra')

            @if(empty($mano_obra_real[0]->id))
                <div class="d-flex flex-column align-items-center m-3">
                    <div class="alert alert-danger alert-dismissible fade show col-md-12 mt-2" role="alert">
                        <strong>No se ha cargado información de la mano de obra</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @else
                     <!-- Mano de obra cargada -->
                    <h3 class="text-center m-3">
                        Mano de obra cargada
                    </h3>
                    <div class="table-responsive shadow rounded">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="border-0 text-center text-secondary">Tipo de trabajo</th>
                                    <th class="border-0 text-center">Precio por metros cuadrados</th>
                                    <th class="border-0 text-center">Fecha</th>
                                    <th class="border-0 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($mano_obra_real as $mano)
                                <tr>
                                    <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm"><strong>{{$mano->tipo_trabajo}}</strong> </p></td>
                                    <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$mano->precio_metro_cuadrado}}</p></td>
                                    <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$mano->fecha_mano}}</p></td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <button wire:click="borrarManoObraReal({{$mano->id}})" target="_blank" class="btn btn-outline-primary m-1 mt-0">
                                                <span class="fas fa-trash text-danger"></span>
                                            </button>
                                            
                                        </div>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                <!-- Fin Mano de obra cargada -->

            @endif

            <div class="row d-flex flex-column align-items-center">
                <div class="col-md-8">
                    <div class="rounded shadow p-0 pb-3 m-3">
                        <h3 class="bg-dark text-white text-center m-0 rounded-top">
                           Cargar Mano de obra
                        </h3>
                        <form wire:submit.prevent="cargarManoObraReal">
                            
                            <div class="form-group m-3">
                                <label for="tipo_trabajo_real">
                                    Tipo de trabajo
                                </label>
                               
                                <input type="text" wire:model.defer="tipo_trabajo_real" 
                                @error('tipo_trabajo_real')
                                    class="form-control is-invalid"
                                    @else
                                    class="form-control"
                                @enderror
                                id="tipo_trabajo_real">
                                @error('tipo_trabajo_real') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group m-3">
                                <label for="precio_metro_cuadrado_real">
                                    Precio por metros cuadrados
                                </label>
                                <input type="text" wire:model.defer="precio_metro_cuadrado_real" 
                                @error('precio_metro_cuadrado_real')
                                    class="form-control is-invalid"
                                    @else
                                    class="form-control"
                                @enderror 
                                id="precio_metro_cuadrado_real">
                                @error('precio_metro_cuadrado_real') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group m-3">
                                <label for="fecha_mano_real">
                                    Fecha
                                </label>
                                <input type="date" wire:model.defer="fecha_mano_real" 
                                @error('fecha_mano_real')
                                    class="form-control is-invalid"
                                    @else
                                    class="form-control"
                                @enderror 
                                id="fecha_mano_real">
                                @error('fecha_mano_real') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-grid gap-2 m-3">
                                <button class="btn btn-secondary">Cargar mano de obra</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @break

        @endswitch
            @break

         @case('emitir_presupuesto')
            <h1>Aquí va lo de emitir presupuesto</h1>
            @break

        @default
            
    @endswitch

    
</div>
