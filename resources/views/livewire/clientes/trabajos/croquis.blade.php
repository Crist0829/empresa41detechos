<div class="row d-flex flex-column align-items-center">
    @if(!empty($orden_visita))
        @if(empty($orden_visita->croquis_techo))
            <div class="col-md-8">
                <div class="rounded shadow p-0 pb-3 m-3">
                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                        Cargar Croquis de techo
                    </h3>
                    <form wire:submit.prevent="cargarCroquisTecho">
                        <div class="form-group m-3">
                            <label for="croquis_techo">
                                Cargar croquis de techo
                            </label>
                            <div class="d-flex flex-row">
                                <input type="file" wire:model="croquis_techo" class="form-control" id="croquis_techo">
                                <div wire:loading wire:target="croquis_techo" class="m-2">
                                    <div class="spinner-border" role="status">
                                      </div>
                                </div>
                            </div>
                            
                            @error('croquis_techo') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-grid gap-2 m-3">
                            <button type="submit" class="btn btn-secondary">
                                Cargar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
                @else
                    <div class="col-md-8">
                        <div class="rounded shadow p-0 pb-3 m-3">
                            <h3 class="bg-dark text-white text-center m-0 rounded-top">
                                Croquis de techo
                            </h3>
                            <div class="d-flex flex-column align-items-center m-3">
                                <p></p>
                                <figure class="rounded figure">
                                    <img src="{{asset("$orden_visita->croquis_techo")}}" alt="" class="rounded figure-img img-fluid">
                                </figure>
                            </div>
                            <hr>
                            <div class="m-3 d-flex flex-row justify-content-end">
                                <button class="btn btn-danger m-1" wire:click="eliminarCroquisTecho">
                                    <span class="m-1">Eliminar</span>
                                    <span class="m-1 fas fa-trash"></span>
                                </button>
                                <button type="button" class="btn btn-block btn-secondary m-1" wire:click="mostrarActualizarTecho">
                                    <span class="m-1">Actualizar</span>
                                    @if(!$actualizar_croquis_techo)
                                        <span class="fas fa-arrow-down m-1"></span>
                                    @endif
                                </button>
                                @if($actualizar_croquis_techo)
                                    <button class="btn btn-primary m-1" wire:click="ocultarActualizarTecho">
                                        <span class="fas fa-times m-1"></span>
                                    </button>
                                @endif
                            </div>
                            @if ($actualizar_croquis_techo)
                            <div class="rounded shadow p-0 pb-3 m-3">
                                <h3 class="bg-dark text-white text-center m-0 rounded-top">
                                   Actualizar Croquis de techo
                                </h3>
                                <div class="form-group m-3">
                                    <label for="croquis_techo">
                                        Cargar croquis de techo
                                    </label>
                                    <div class="d-flex flex-row">
                                        <input type="file" wire:model="croquis_techo" class="form-control" id="croquis_techo">
                                        <div wire:loading wire:target="croquis_techo" class="m-2">
                                            <div class="spinner-border" role="status">
                                              </div>
                                        </div>
                                    </div>
                                    @error('croquis_techo') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="d-grid gap-2 m-3">
                                    <button wire:click="actualizarCroquisTecho" class="btn btn-secondary">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
            @endif

        @if(empty($orden_visita->croquis_ubicacion))
            <div class="col-md-8">
                <div class="rounded shadow p-0 pb-3 m-3">
                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                        Cargar Croquis de ubicacion
                    </h3>
                    <form wire:submit.prevent="cargarCroquisUbicacion">
                        <div class="form-group m-3">
                            <label for="croquis_ubicacion">
                                Cargar croquis de ubicación
                            </label>
                            <div class="d-flex flex-row">
                                <input type="file" wire:model="croquis_ubicacion" class="form-control" id="croquis_ubicacion">
                                <div wire:loading wire:target="croquis_ubicacion" class="m-2">
                                    <div class="spinner-border" role="status">
                                      </div>
                                </div>
                            </div>
                            @error('croquis_ubicacion') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="d-grid gap-2 m-3">
                            <button type="submit" class="btn btn-secondary">
                                Cargar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @else
                <div class="col-md-8">
                    <div class="rounded shadow p-0 pb-3 m-3">
                        <h3 class="bg-dark text-white text-center m-0 rounded-top">
                            Croquis de ubicacion
                        </h3>

                        <div class="d-flex flex-column align-items-center m-3">
                            <figure class="rounded figure">
                                <img src="{{asset("$orden_visita->croquis_ubicacion")}}" alt="" class="rounded figure-img img-fluid">
                            </figure>
                        </div>
                        <hr>
                        <div class="m-3 d-flex flex-row justify-content-end">
                            <button class="btn btn-danger m-1" wire:click="eliminarCroquisUbi">
                                <span class="m-1">Eliminar</span>
                                <span class="m-1 fas fa-trash"></span>
                            </button>
                            <button type="button" class="btn btn-block btn-secondary m-1" wire:click="mostrarActualizarUbi">
                                <span class="m-1">Actualizar</span>
                                @if(!$actualizar_croquis_ubicacion)
                                    <span class="fas fa-arrow-down m-1"></span>
                                @endif
                            </button>
                            @if($actualizar_croquis_ubicacion)
                                <button class="btn btn-primary m-1" wire:click="ocultarActualizarUbi">
                                    <span class="fas fa-times m-1"></span>
                                </button>
                            @endif
                        </div>
                        @if ($actualizar_croquis_ubicacion)
                        <div class="rounded shadow p-0 pb-3 m-3">
                            <h3 class="bg-dark text-white text-center m-0 rounded-top">
                               Actualizar Croquis de ubicacion
                            </h3>
                            <div class="form-group m-3">
                                <label for="croquis_ubicacion">
                                    Cargar croquis de ubicacion
                                </label>
                                <div class="d-flex flex-row">
                                    <input type="file" wire:model="croquis_ubicacion" class="form-control" id="croquis_ubicacion">
                                    <div wire:loading wire:target="croquis_ubicacion" class="m-2">
                                        <div class="spinner-border" role="status">
                                          </div>
                                    </div>
                                </div>
                                @error('croquis_ubicacion') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-grid gap-2 m-3">
                                <button wire:click="actualizarCroquisUbi" class="btn btn-secondary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
        @endif
    @endif
</div>