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
                <div class="table-responsive shadow rounded">
                    @if (session()->has('eliminado'))
                    <div class="alert alert-danger text-center">
                        <p>{{ session('eliminado') }}</p>
                    </div>
                    @endif
                    <table class="table table-centered table-nowrap mb-0 rounded">
                        <thead class="thead-dark">
                            <tr>
                                <th class="border-0">Nombre</th>
                                <th class="border-0">Código</th>
                                <th class="border-0">Medida</th>
                                <th class="border-0">Cantidad</th>
                                <th class="border-0">Precio de costo</th>
                                <th class="border-0">Precio de venta</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($stocks as $stock)
                            <tr>
                                <td><a href="{{route('stockShow', $stock->id)}}" class="btn btn-secondary btn-sm">{{$stock->nombre}}</a></td>
                                <td>{{$stock->codigo}}</td>
                                <td>{{$stock->medida}}</td>
                                <td>{{$stock->cantidad}}</td>
                                <td>{{$stock->precio_costo}}</td>
                                <td>{{$stock->precio_venta}}</td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex flex-column align-items-center mt-3">
                    {{$stocks->links()}}
                </div>
            </div>
        </x-card>
</div>
