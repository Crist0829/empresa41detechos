<main>
    <!-- Section -->
    <section class="d-flex align-items-center my-5 mt-lg-6 mb-lg-5">
        <div class="container">
            <div class="row justify-content-center form-bg-image" data-background-lg="../../assets/img/illustrations/signin.svg">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="mb-4 mb-lg-0 bg-white shadow-soft border rounded border-light p-4 p-lg-5 w-100 fmxw-500">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <h1 class="mb-0 h3">Crear cuenta</h1>
                        </div>
                        <form action="{{route('register')}}" method="POST">
                            @csrf
                            <!-- Form -->
                            <div class="form-group mb-4">
                                <label for="email">Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3"><span class="fas fa-envelope"></span></span>
                                    <input type="text" class="form-control" placeholder="Robert" id="email" name="name" autofocus required>
                                </div>  
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon3"><span class="fas fa-envelope"></span></span>
                                    <input type="email" class="form-control" placeholder="example@company.com" id="email" name="email" autofocus required>
                                </div>  
                            </div>
                            <!-- End of Form -->
                            <div class="form-group">
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="password">Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon4"><span class="fas fa-unlock-alt"></span></span>
                                        <input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
                                    </div>  
                                </div>
                                <!-- End of Form -->
                                <!-- Form -->
                                <div class="form-group mb-4">
                                    <label for="confirm_password">Repite tu contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon5"><span class="fas fa-unlock-alt"></span></span>
                                        <input type="password" placeholder="Confirm Password" class="form-control" id="confirm_password" name="password_confirmation" required>
                                    </div>  
                                </div>
                                <!-- End of Form -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="terms" name= "terms" required>
                                    <label class="form-check-label" for="terms">
                                        Acepto los <a href="#">términos de uso y condiciones</a>
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark">Registrar</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <span class="fw-normal">
                                ¿Ya estás registrado?
                                <a href="./sign-in.html" class="fw-bold">Ingresa aquí</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-footer/>

</main>