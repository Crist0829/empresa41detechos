<x-principal>
    <x-slot name="title">
        Inicio
    </x-slot>
    @switch(Auth::user()->rol)
        @case('propietario')
        <x-sidebar>
            <x-slot name='inicio'>
                active
            </x-slot>
        </x-sidebar>
            @break
        @case('empleado')
        <x-sidebar-empleado>
            <x-slot name='inicio'>
                active
            </x-slot>
        </x-sidebar-empleado>
            @break
        @default
        <x-sidebar-cliente>
            <x-slot name='inicio'>
                active
            </x-slot>
        </x-sidebar-cliente>
    @endswitch
    <x-main>
        <x-nav-user/>
        <x-row>
            <h2 class="text-secondary text-center">¡Hola, {{Auth::user()->name}}, bienvenid@!</h2>
            @switch(Auth::user()->rol)
                @case('propietario')
                    <h4 class="text-white text-center">
                        Tienes el rol de <span class="text-tertiary">propietario</span>, puedes acceder a todo el módulo de gestión y de administración de usuarios de la plataforma...
                    </h4>
                    @break
                @case('empleado')
                    <h4 class="text-center text-white">Tienes el rol de <span class="text-tertiary">Empleado</span>, puedes acceder a todo el módulo de gestión...</h4>
                    @break
                    <h4 class="text-center text-white">Puedes ver tu información, compras y turnos...</h4>
                @default 
            @endswitch
        </x-row>
    </x-main>
</x-principal>