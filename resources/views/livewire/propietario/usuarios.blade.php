<div>
    <div class="m-3">
        <form wire:submit.prevent="updatingSearch">
            <div class="form-group">
                <input class="form-control" type="text" wire:model='search' placeholder="Buscar usuario">
            </div>
        </form>
    </div>
    

    <div class="table-responsive shadow rounded">
        <table class="table table-centered table-nowrap mb-0 rounded">
            <thead class="thead-dark">
                <tr>
                    <th class="border-0">#</th>
                    <th class="border-0">Nombre</th>
                    <th class="border-0">Email</th>
                    <th class="border-0">Rol</th>
                </tr>
            </thead>
            <tbody>
    
                @foreach ($users as $user)
    
                    <tr>
    
                        <td class="border-0 fw-bold">
                            {{$user->id}}
                        </td>
                        <td class="border-0 fw-bold">
                            @switch($user->rol)
                                @case('propietario')
                                    <a href="{{route('showusuario', $user->id)}}" class="btn btn-danger btn-sm">{{$user->name}}</a>
                                    @break
                                @case('empleado')
                                    <a href="{{route('showusuario', $user->id)}}" class="btn btn-primary btn-sm">{{$user->name}}</a>
                                    @break
                                @case('cliente')
                                    <a href="{{route('showusuario', $user->id)}}" class="btn btn-tertiary btn-sm">{{$user->name}}</a>
                                    @break
                            @endswitch
                        </td>
                        <td class="border-0 fw-bold">{{$user->email}}</td>
                        <td class="border-0 fw-bold">

                            @switch($user->rol)
                                @case('propietario')

                                    <p class="text-danger">Propietario</p>
                                    
                                    @break
                                @case('empleado')

                                    <p class="text-primary">Empleado</p>
                                    
                                    @break
                                @default
                                <p class="text-tertiary">Cliente</p>
                            @endswitch

                        </td>
    
                    </tr>
                    
                @endforeach
              
            </tbody>
        </table>
    
        <div class="d-flex flex-column align-items-center m-3 mt-5">
            {{$users->links()}}
        </div>
        
    </div>

</div>
