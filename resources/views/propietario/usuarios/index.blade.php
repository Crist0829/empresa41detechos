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
            
            <div class="col-md-12">

                <x-card>
                    <x-slot name='title'>
                        Administrar usuarios
                    </x-slot>

                    <livewire:propietario.usuarios/>

                </x-card>

            </div>
        </x-row>
    </x-main>
</x-principal>