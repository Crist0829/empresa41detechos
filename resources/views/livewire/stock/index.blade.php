<div class="col-md-12">
        <x-card>
            <x-slot name="header_content">
                <div class="m-3 col-md-12">
                    <form wire:submit.prevent="updatingSearch">
                        <div class="form-group">
                            <input class="form-control" type="text" wire:model='search' placeholder="Buscar articulo">
                        </div>
                    </form>
                </div>
            </x-slot>
            <div>
                @if(session()->has('eliminado'))
                    <div class="alert alert-tertiary alert-dismissible fade show m-3 mt-0" role="alert">
                        <strong>{{session('eliminado')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
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
                                    <th class="border-0 text-center text-secondary">Medida</th>
                                    <th class="border-0 text-center">Cantidad</th>
                                    <th class="border-0 text-center text-secondary">Precio de venta</th>
                                    <th class="border-0 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($stocks as $stock)
                                <tr>
                                    <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm"><strong>{{$stock->nombre}}</strong> </p></td>
                                    <td><p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$stock->codigo}}</p></td>
                                    <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm">{{$stock->medida}}</p></td>
                                    <td>
                                        @if($stock->cantidad <= $stock->stock_minimo)
                                            <p class="text-white bg-danger rounded text-center p-1 mt-2 shadow-sm">{{$stock->cantidad}}</p>
                                            @else
                                            <p class="text-white bg-dark rounded text-center p-1 mt-2 shadow-sm">{{$stock->cantidad}}</p>
                                        @endif
                                    </td>
                                    <td><p class="bg-secondary rounded text-center p-1 mt-2 shadow-sm"><strong>{{$stock->precio_venta}}</strong> </p></td>
                                    <td>
                                        <div class="d-flex flex-row justify-content-center">
                                            <a href="{{route('stockShow', $stock->id)}}" class="btn btn-outline-primary m-1 mt-0">
                                                <span class="fas fa-eye"></span>
                                            </a>
                                            <button type="button" class="btn btn-outline-primary m-1 mt-0" data-bs-toggle="modal" data-bs-target="{{"#".str_replace(" ", '_', $stock->nombre)}}">
                                                <span class="fas fa-trash text-danger"></span>
                                            </button>
                                            <div class="modal fade" id={{str_replace(" ", '_', $stock->nombre)}} tabindex="-1" role="dialog" aria-labelledby={{str_replace(" ", '_', $stock->nombre)}} aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="text-center text-danger">Eliminar elemento</h2>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                             <h6 class="text-center">¿Estás seguro que deseas eliminar el articulo {{$stock->nombre}}?</h6>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" wire:click="eliminarArticulo({{$stock->id}})" data-bs-dismiss="modal">Aceptar</button>
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
        </x-card>
</div>
