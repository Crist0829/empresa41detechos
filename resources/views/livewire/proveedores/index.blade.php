<div class="col-md-12">
    <x-card>
        <x-slot name="header_content">
            <div class="m-3 col-md-12">
                <form wire:submit.prevent="updatingSearch">
                    <div class="form-group">
                        <input class="form-control" type="text" wire:model='search' placeholder="Buscar Proveedor por nombre">
                    </div>
                </form>
            </div>
        </x-slot>
        <div>
            @if(session()->has('eliminado'))
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        <strong>{{session('eliminado')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            @if(empty($proveedores[0]))
                    @if(session()->has('no_proveedores'))
                        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                            <strong>{{session('no_proveedores')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @else
                        <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                            <strong>¡No se han cargado proveedores!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>   
                    @endif
                @else
                <div class="table-responsive shadow rounded">
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th class="border-0 text-center text-secondary">Nombre</th>
                                <th class="border-0 text-center">DNI o Cuit</th>
                                <th class="border-0 text-center">Telefono de contacto</th>
                                <th class="border-0 text-secondary">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                            <tr>
                                <td><p class="text-center bg-secondary rounded mt-2 p-1 shadow"><strong>{{$proveedor->nombre}}</strong></p></td>
                                <td><p class="text-center bg-dark rounded text-white rounded mt-2 p-1 shadow">{{$proveedor->documento}}</p></td>
                                <td><p class="text-center bg-dark rounded text-white rounded mt-2 p-1 shadow">{{$proveedor->telefono}}</p></td>
                                <td>
                                    <div class="d-flex flex-row justify-content-center">
                                        <a href="{{route('proveedoresShow', $proveedor->id)}}" class="btn btn-outline-primary m-1">
                                            <span class="fas fa-eye"></span>
                                        </a>
                                        <button type="button" class="btn btn-outline-primary m-1" data-bs-toggle="modal" data-bs-target="{{"#".str_replace(" ", '_', $proveedor->nombre)}}">
                                            <span class="fas fa-trash text-danger"></span>
                                        </button>
                                        <div class="modal fade" id={{str_replace(" ", '_', $proveedor->nombre)}} tabindex="-1" role="dialog" aria-labelledby={{str_replace(" ", '_', $proveedor->nombre)}} aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="text-center text-danger">Eliminar elemento</h2>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                         <p class="text-center">¿Estás seguro que deseas eliminar el Proveedor {{$proveedor->nombre}}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" wire:click="eliminarProveedor({{$proveedor->id}})" data-bs-dismiss="modal">Aceptar</button>
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
                    {{$proveedores->links()}}
                </div>
            @endif
        </div>
    </x-card>
</div>