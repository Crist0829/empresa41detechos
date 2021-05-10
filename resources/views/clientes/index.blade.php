<x-principal>
    <x-slot name="title">
        Inicio
    </x-slot>
    @switch(Auth::user()->rol)
        @case('propietario')
        <x-sidebar>
            <x-slot name='gestion'>
                active
            </x-slot>
            <x-slot name='stock'>
                active
            </x-slot>
        </x-sidebar>
            @break
        @case('empleado')

        <x-sidebar-empleado>
            <x-slot name='gestion'>
                active
            </x-slot>
            <x-slot name='stock'>
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
            <h2 class="text-white text-center">Gestion de clientes</h2>
        </x-row>

    </x-main>
</x-principal>