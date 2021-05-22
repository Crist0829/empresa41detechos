<x-principal>
    <x-slot name="title">
        Administrar usuarios
    </x-slot>
    <x-sidebar>
        <x-slot name="showPlataforma">
            show
        </x-slot>
        <x-slot name="plataforma">
            active
        </x-slot>
        <x-slot name='usuarios'>
            active
        </x-slot>
    </x-sidebar>
    <x-main>
        <x-nav-user/>
        <x-row>
            <div class="col-md-12">
                <h2 class="text-center text-secondary">Administrar usuarios</h2>
                <x-card>
                    <livewire:propietario.usuarios/>
                </x-card>
            </div>
        </x-row>
    </x-main>
</x-principal>