<x-principal>

    <x-slot name='body'>
        bg-dark p-0
    </x-slot>

    <x-slot name="title">

        Iniciar sesión

    </x-slot>

    <div class="d-flex flex-column align-items-center mt-3">
        <figure>
            <img src="{{asset('assets/img/brand-logo-login.png')}}" alt="logo" width="500">
        </figure>
    </div>

    <x-auth.login/>


</x-principal>
