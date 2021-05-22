<div class="col-md-12">
    <x-card>
        <x-slot name="header_content">
            <div class="d-flex flex-row justify-content-center">
                <a href="{{route('proveedoresIndex')}}" class="btn btn-primary m-2">
                    <span class="fas fa-arrow-left"></span>
                </a>
                <h2 class="text-center m-2">{{$proveedor->nombre}}</h2>
            </div>
        </x-slot>
        <div class="row d-flex flex-row justify-content-center mt-0 mb-3">
            <div>
                <ul class="nav nav-pills d-flex flex-row justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'informacion' ? 'active' : ''}} vib-t2" wire:click="showInfo">Informacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'productos' ? 'active' : ''}} vib-t2" wire:click="showProd">Productos comprados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'cheques' ? 'active' : ''}} vib-t2" wire:click="showCheques">Cheques</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$activo == 'vencimientos' ? 'active' : ''}} vib-t2" wire:click="showVenci">Vencimientos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link vib-t2" wire:click="noShow">
                            <span class="fas fa-arrow-down"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        @if(session()->has('productoEliminado'))
            <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                <strong>{{session('productoEliminado')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('chequeEliminado'))
            <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                <strong>{{session('chequeEliminado')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('vencimientoEliminado'))
            <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                <strong>{{session('vencimientoEliminado')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @switch($activo)
            @case("informacion")
            <div class="row d-flex flex-column align-items-center">
                <div class="col-md-10 rounded shadow p-0 m-1">
                    <h3 class="bg-dark text-white text-center m-0 rounded-top">
                        Información
                    </h3>
                    <form wire:submit.prevent='updateInfo'>
                        <div class="form-group m-3">
                            <label for="nombre">
                                Nombre
                            </label>
                            @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                            <input type="text" class="form-control" placeholder="{{$proveedor->nombre}}" id="nombre" wire:model="nombre">
                        </div>
                        <div class="form-group m-3">
                            <label for="documento">
                                Dni o Cuit
                            </label>
                            @error('documento') <span class="error text-danger">{{ $message }}</span> @enderror
                            <input type="text" class="form-control" placeholder="{{$proveedor->documento}}" id="documento" wire:model="documento">
                        </div>
                        <div class="form-group m-3">
                            <label for="email">
                                Email
                            </label>
                            @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                            <input type="text" class="form-control" placeholder="{{$proveedor->email}}" id="email" wire:model="email">
                        </div>
                        <div class="form-group m-3">
                            <label for="telefono">
                                Teléfono de contacto
                            </label>
                            @error('telefon') <span class="error text-danger">{{ $message }}</span> @enderror
                            <input type="text" class="form-control" placeholder="{{$proveedor->telefono}}" id="telefono" wire:model="telefono">
                        </div>
                        <div class="form-group m-3">
                            <label for="forma_pago">
                                Forma de pago actual
                            </label>
                            @error('forma_pago') <span class="error text-danger">{{ $message }}</span> @enderror
                            <select id="forma_pago" class="form-control" wire:model = "forma_pago">
                                <option value="cheque">Cheque</option>
                                <option value="contado">Contado</option>
                                <option value="cuenta_corriente">Cuenta corriente</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2 m-3">
                            <button class="btn btn-secondary">Actualizar información</button>
                        </div>
                    @if(session()->has('actualizado'))
                        <div class="m-3 text-center">
                            <h3 class="text-success">{{session('actualizado')}}</h3>
                        </div>
                    @endif
                    @if(session()->has('errorA'))

                        <div class="m-3 text-center">
                            <h3 class="text-danger">{{session('errorA')}}</h3>
                        </div>
                    @endif
                    </form>
                </div>
            </div>
                @break
            @case("productos")
                <div class="row d-flex flex-column align-items-center"> 
                    @if($productos_aux)
                    <div class="col-md-8">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Nada para mostrar...</strong>Por favor, cargue los productos comprados a este proveedor.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
                    </div>
                        @else
                        <div class="col-md-12">
                            <h2 class="text-center m-3">Productos comprados</h2>
                            <div class="table-responsive shadow rounded m-3">
                                <table class="table table-centered table-nowrap mb-0 rounded">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="border-0">Nombre</th>
                                            <th class="border-0">Precio</th>
                                            <th class="border-0">Fecha de compra</th>
                                            <th class="border-0">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{$producto->nombre_producto}}</td>
                                            <td>{{$producto->precio}}</td>
                                            <td>{{$producto->fecha_compra}}</td>
                                            <td>
                                                <div class="d-fex flex-row align-items-center">
                                                    <a wire:click="eliminarProducto({{$producto->id}})">
                                                        <span class="fas fa-trash text-danger m-2"></span>
                                                    </a>
                                                    <a href="">
                                                        <span class="fas fa-eye m-2"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                      @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex flex-column align-items-center mt-3">
                                {{$productos->links()}}
                            </div>
                            
                        </div>
                    @endif
                    <div class="col-md-8">
                        <div class="rounded shadow p-0 pb-3 m-3">
                            <h3 class="bg-dark text-white text-center m-0 rounded-top">
                                Cargar producto
                            </h3>
                            <form wire:submit.prevent="cargarProducto">
                                <div class="form-group m-3">
                                    @error('nombre_producto') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="text" wire:model="nombre_producto" class="form-control" placeholder="Nombre del producto">
                                </div>
                                <div class="form-group m-3">
                                    @error('precio') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="text" wire:model="precio" class="form-control" placeholder="Precio del producto">
                                </div>
                                <div class="form-group m-3">
                                    <label for="fecha_compra">
                                        Fecha de la compra
                                    </label>
                                    @error('fecha_compra') <span class="error text-danger">{{ $message }}</span> @enderror
                                    <input type="date" wire:model="fecha_compra" class="form-control" id="fecha_compra">
                                </div>
                                <div class="d-grid gap-2 m-3">
                                    <button class="btn btn-secondary">Cargar producto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @break
            @case("vencimientos")
            <div class="row d-flex flex-column align-items-center"> 
                @if($vencimientos_aux)
                <div class="col-md-8">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Nada para mostrar...</strong> Por favor, cargue los datos de vencimiento de pagos.
                        para este proveedor 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                </div>
                    @else
                    <div class="col-md-12">
                        <h2 class="text-center m-3">Datos de vencimientos</h2>
                        <div class="table-responsive shadow rounded m-3">
                            <table class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="border-0">Forma de pago</th>
                                        <th class="border-0">Fecha de inicio</th>
                                        <th class="border-0">Fecha de vencimiento</th>
                                        <th class="border-0">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($vencimientos as $vencimiento)
                                    <tr>
                                        <td>{{$vencimiento->forma_pago_v}}</td>
                                        <td>{{$vencimiento->fecha_inicio}}</td>
                                        <td>{{$vencimiento->fecha_vencimiento}}</td>
                                        <td>
                                            <div class="d-fex flex-row align-items-center">
                                                <a wire:click="eliminarVencimiento({{$vencimiento->id}})">
                                                    <span class="fas fa-trash text-danger m-2"></span>
                                                </a>
                                                <a href="">
                                                    <span class="fas fa-eye m-2"></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex flex-column align-items-center mt-3">
                            {{$vencimientos->links()}}
                        </div>
                        
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="rounded shadow p-0 pb-3 m-3">
                        <h3 class="bg-dark text-white text-center m-0 rounded-top">
                            Cargar datos de vencimiento de pagos
                        </h3>

                        <form wire:submit.prevent="cargarVencimiento">
                            <div class="form-group m-3">
                                @error('forma_pago_v') <span class="error text-danger">{{ $message }}</span> @enderror
                                <select  id="forma_pago_v" class="form-control" wire:model="forma_pago_v">
                                    <option value="cheque">Cheque</option>
                                    <option value="cuenta_corriente">Cuenta corriente</option>
                                </select>
                            </div>
                            <div class="form-group m-3">
                                <label for="fecha_inicio">Fecha de inicio</label>
                                @error('fecha_inicio') <span class="error text-danger">{{ $message }}</span> @enderror
                                <input type="date" wire:model="fecha_inicio" class="form-control" id="fecha_inicio">
                            </div>
                            <div class="form-group m-3">
                                <label for="fecha_vencimiento">
                                    Fecha de vencimiento
                                </label>
                                @error('fecha_vencimiento') <span class="error text-danger">{{ $message }}</span> @enderror
                                <input type="date" wire:model="fecha_vencimiento" class="form-control" id="fecha_vencimiento">
                            </div>
                            <div class="d-grid gap-2 m-3">
                                <button class="btn btn-secondary">Cargar datoss</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
                @break
            @case("cheques")
            <div class="row d-flex flex-column align-items-center"> 
                @if($cheques_aux)
                <div class="col-md-8">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Nada para mostrar...</strong>Por favor, cargue los datos de cheques para este proveedor.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                </div>
                    @else
                    <div class="col-md-12">
                        <h3 class="text-center m-3">Datos de cheques</h3>
                        <div class="table-responsive shadow rounded m-3">
                            <table class="table table-centered table-nowrap mb-0 rounded">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="border-0">Banco</th>
                                        <th class="border-0">Número</th>
                                        <th class="border-0">Fecha de pago</th>
                                        <th class="border-0">Fecha de vencimiento</th>
                                        <th class="border-0">¿Entregado?</th>
                                        <th class="border-0">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($cheques as $cheque)
                                    <tr>
                                        <td>{{$cheque->banco}}</td>
                                        <td>{{$cheque->numero}}</td>
                                        <td>{{$cheque->fecha_pago}}</td>
                                        <td>{{$cheque->fecha_vencimiento_c}}</td>
                                        <td>
                                            @switch($cheque->pagado)
                                                @case("si")
                                                    Sí
                                                    @break
                                                @case("no")
                                                    No
                                                    @break
                                                @default
                                                    
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="d-fex flex-row align-items-center">
                                                <a wire:click="eliminarCheque({{$cheque->id}})">
                                                    <span class="fas fa-trash text-danger m-2"></span>
                                                </a>
                                                <a href="">
                                                    <span class="fas fa-eye m-2"></span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex flex-column align-items-center mt-3">
                            {{$cheques->links()}}
                        </div>
                    </div>
                @endif
                <div class="col-md-8">
                    <div class="rounded shadow p-0 pb-3 m-3">
                        <h3 class="bg-dark text-white text-center m-0 rounded-top">
                            Cargar datos de cheques
                        </h3>
                        <form wire:submit.prevent="cargarCheque">
                            <div class="form-group m-3">
                                <label for="banco">
                                    Banco
                                </label>
                                @error('banco') <span class="error text-danger">{{ $message }}</span> @enderror
                                <input type="text" class="form-control" wire:model="banco" id="banco">
                            </div>
                            <div class="form-group m-3">
                                <label for="numero">Número</label>
                                @error('numero') <span class="error text-danger">{{ $message }}</span> @enderror
                                <input type="text" wire:model="numero" class="form-control" id="numero">
                            </div>
                            <div class="form-group m-3">
                                <label for="fecha_pago">
                                    Fecha de pago
                                </label>
                                @error('fecha_pago') <span class="error text-danger">{{ $message }}</span> @enderror
                                <input type="date" wire:model="fecha_pago" class="form-control" id="fecha_pago">
                            </div>
                            <div class="form-group m-3">
                                <label for="fecha_vencimiento_c">
                                    Fecha de vencimiento
                                </label>
                                @error('fecha_vencimiento_c') <span class="error text-danger">{{ $message }}</span> @enderror
                                <input type="date" wire:model="fecha_vencimiento_c" class="form-control" id="fecha_vencimiento_c">
                            </div>
                            <div class="form-group m-3">
                                <label for="entregado" class="form-label">¿Entregado?</label>
                                @error('pagado') <span class="error text-danger">{{ $message }}</span> @enderror
                                <select wire:model="pagado" class="form-control">
                                    <option value="si">Sí</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                            <div class="d-grid gap-2 m-3">
                                <button class="btn btn-secondary">Cargar datos</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
                @break
            @default
        @endswitch
        @if(session()->has('cargado'))
            <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                <strong>{{session('cargado')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('vencimiento'))
            <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                <strong>{{session('vencimiento')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('cheque'))
            <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                <strong>{{session('cheque')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('productoEliminado'))
            <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
                <strong>{{session('productoEliminado')}}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </x-card>
</div>