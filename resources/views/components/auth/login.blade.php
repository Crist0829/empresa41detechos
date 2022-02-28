<main>
    <!-- Section -->
    <section class="d-flex align-items-center my-5 mb-lg-5 mt-2">
        <div class="container">
            <div class="row justify-content-center form-bg-image">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="bg-white shadow-soft border rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <h1 class="mb-0 h3">Iniciar sesión</h1>
                        </div>
                        <form action="{{route('login')}}" method="POST" class="mt-4">
                            @csrf
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1"><span class="fas fa-envelope"></span></span>
                                    <input type="email"  placeholder="example@company.com" id="email" name = "email" autofocus required
                                    @error('email') class="form-control is-invalid" @else class="form-control" @enderror>
                                </div>
                                @error('email') <p class="text-danger">{{$message}}</p> @enderror  
                            </div>
                            <!-- End of Form -->
                            <div class="form-group">
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="password">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon2"><span class="fas fa-unlock-alt"></span></span>
                                        <input type="password" placeholder="Password"  id="password" name="password" required
                                        @error('password') class="form-control is-invalid" @else class="form-control" @enderror>>
                                    </div>
                                    @error('password') <p class="text-danger">{{$message}}</p> @enderror    
                                </div>
                                <!-- End of Form -->
                                <div class="d-flex justify-content-between align-items-top mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                                        <label class="form-check-label mb-0" for="remember">
                                          Recordarme
                                        </label>
                                    </div>
                                    <div><a href="./forgot-password.html" class="small text-right">¿Olvidaste la contraseña?</a></div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-secondary">Ingresar</button>
                            </div>
                        </form>
                       
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <span class="fw-normal">
                                ¿No tienes una cuenta?
                                <a href="{{route('register')}}" class="fw-bold">Crea una</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer class="text-secondary">
        <x-slot name='textlink'>
            text-secondary
        </x-slot>
    </x-footer>
</main>