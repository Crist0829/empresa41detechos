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
            <div class="d-flex flex-row justify-content-center">
                <a href="{{route('adminusuarios')}}" class="btn btn-outline-secondary m-2">
                    <span class="fas fa-arrow-left"></span>
                </a>
                <h3 class="text-center text-secondary m-2">Administrar usuario</h3>
            </div>
            <div class="col-md-12">
               <livewire:propietario.usuario userid="{{$id}}"/>
            </div>
        </x-row>
    </x-main>
</x-principal>