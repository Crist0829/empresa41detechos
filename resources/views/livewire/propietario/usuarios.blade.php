<div>
    <div class="m-3">
        <form wire:submit.prevent="updatingSearch">
            <div class="form-group">
                <input class="form-control" type="text" wire:model='search' placeholder="Buscar usuario">
            </div>
        </form>
    </div>
    @if(session()->has('eliminado'))
    <div class="alert alert-tertiary alert-dismissible fade show m-3" role="alert">
        <strong>{{session('eliminado')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive shadow rounded">
        <table class="table table-centered table-nowrap mb-0 rounded">
            <thead class="thead-dark">
                <tr>
                    <th class="border-0 text-center">#</th>
                    <th class="border-0 text-center text-secondary">Nombre</th>
                    <th class="border-0 text-center">Email</th>
                    <th class="border-0 text-center text-secondary">Rol</th>
                    <th class="border-0 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if($user->id != Auth::user()->id)
                    <tr>
                        <td class="border-0 fw-bold text-center">
                            <p class="text-center bg-primary rounded text-white">{{$user->id}}</p>
                        </td>
                        <td class="border-0 fw-bold text-center">
                            <p class="text-center bg-secondary text-center rounded p-1 fw-bold">{{$user->name}}</p>
                        </td>
                        <td class="border-0 fw-bold"><p class="text-center bg-primary rounded p-1 text-white">{{$user->email}}</p></td>
                        <td class="border-0 fw-bold">
                            @switch($user->rol)
                                @case('propietario')
                                    <p class="text-danger bg-primary rounded p-1 text-center">Propietario</p>
                                    @break
                                @case('empleado')
                                    <p class="text-secondary bg-primary rounded p-1 text-center">Empleado</p>
                                    @break
                                @default
                                <p class="text-tertiary bg-primary rounded p-1 text-center">Cliente</p>
                            @endswitch
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <a href="{{route('showusuario', $user->id)}}" class="btn btn-outline-primary m-1 mt-0">
                                    <span class="fas fa-eye"></span>
                                </a>
                                <button type="button" class="btn btn-outline-primary m-1 mt-0" data-bs-toggle="modal" data-bs-target="{{"#".str_replace(" ", '_', $user->name)}}">
                                    <span class="fas fa-trash text-danger"></span>
                                </button>
                                <div class="modal fade" id={{str_replace(" ", '_', $user->name)}} tabindex="-1" role="dialog" aria-labelledby={{str_replace(" ", '_', $user->name)}} aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="text-center text-danger">Eliminar elemento</h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                 <p class="text-center">¿Estás seguro que deseas eliminar al usuario <strong class="text-danger">{{$user->name}}</strong>?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" wire:click="eliminarUsuario({{$user->id}})" data-bs-dismiss="modal">Aceptar</button>
                                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-column align-items-center m-3">
        {{$users->links()}}
    </div>
</div>
