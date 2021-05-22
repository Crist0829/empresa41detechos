<x-principal>
    <x-slot name="title">
        Gestion de proveedores
    </x-slot>
    @switch(Auth::user()->rol)
        @case('propietario')
        <x-sidebar>
            <x-slot name="showGestion">
                show
            </x-slot>
            <x-slot name='gestion'>
                active
            </x-slot>
            <x-slot name='proveedores'>
                active
            </x-slot>
        </x-sidebar>
            @break
        @case('empleado')
        <x-sidebar-empleado>
            <x-slot name="showGestion">
                show
            </x-slot>
            <x-slot name='gestion'>
                active
            </x-slot>
            <x-slot name='proveedores'>
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
            <div class="d-flex flex-row justify-content-between align-items-center">
                <x-proveedores.nav>
                    <x-slot name="show">
                        active
                    </x-slot>
                </x-proveedores.nav>
                <h3 class="text-secondary text-center m-4">GESTIÓN DE PROVEEDORES</h3>
            </div>
            <livewire:proveedores.index/>
        </x-row>
    </x-main>
</x-principal>