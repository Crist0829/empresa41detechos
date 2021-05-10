<x-principal>
    <x-slot name="title">
        Gestión comercial
    </x-slot>
    
    @switch(Auth::user()->rol)
        @case('propietario')
        <x-sidebar>
            <x-slot name='gestion'>
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
            <div class='col-md-12'>
                <h2 class="text-center text-white">Gestión comercal</h2>
                <h4 class="text-center text-white">Remitos</h4>
                <x-comercio.nav/>
            </div>  
        </x-row>

    </x-main>
</x-principal>