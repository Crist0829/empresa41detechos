<x-principal>
    <x-slot name="title">
        Administrar usuarios
    </x-slot>

    <x-sidebar>
        <x-slot name='usuarios'>
            active
        </x-slot>
        
    </x-sidebar>
    <x-main>
        <x-nav-user/>
        <x-row>
            <x-slot name="title">
                Administrar usuario
            </x-slot>
            
            <div class="col-md-12">

               <livewire:propietario.usuario userid="{{$id}}"/>

            </div>
        </x-row>
    </x-main>
</x-principal>