<x-principal>
    <x-slot name="title">
        Producto
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
            <x-slot name='stock'>
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
            <div class="d-flex flex-row justify-content-between align-items-center">
                <x-stock.nav>
                    <x-slot name="stocknav">
                        active
                    </x-slot>
                </x-stock.nav>
                <h2 class="text-secondary text-center m-4">GESTIÓN DE STOCK</h2>
            </div>
            <livewire:stock.show stockid="{{$id}}">         
        </x-row>
    </x-main>
</x-principal>