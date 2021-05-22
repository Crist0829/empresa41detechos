<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0 m-3 mt-1">
    <div class="container-fluid px-0">
      <div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
        <div></div>
        <!-- formulario
        <div class="d-flex align-items-center">
           Search form 
          <form class="navbar-search form-inline" id="navbar-search-main">
            <div class="input-group input-group-merge search-bar">
                <span class="input-group-text" id="topbar-addon"><span class="fas fa-search"></span></span>
                <input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search" aria-label="Search" aria-describedby="topbar-addon">
            </div>
          </form>
        </div>
         -->

         <!-- Nav-link -->
        <ul class="navbar-nav align-items-center">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <div class="media d-flex align-items-center">
                <img class="user-avatar md-avatar rounded-circle" width="100" alt="Image placeholder" src="{{Auth::user()->profile_photo_path ?? asset('/assets/img/users/default.png')}}">
                <div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
                  <span class="mb-0 font-small fw-bold">{{Auth::user()->name}}</span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-0">
                <a class="dropdown-item rounded-top fw-bold" href="#"><span class="far fa-user-circle"></span>Perfil</a>
                <a class="dropdown-item fw-bold" href="#"><span class="fas fa-cog"></span>Configuración</a>
                <a class="dropdown-item fw-bold" href="#"><span class="fas fa-envelope-open-text"></span>Mensajes</a>
                <div role="separator" class="dropdown-divider my-0"></div>
                <div class="dropdown-item rounded-bottom fw-bold">
                  <form action="{{route('logout')}}" method="POST">
                    @csrf
                    <div class="d-grid gap-2">
                      <button class="btn btn-primary btn-sm"><span class="fas fa-sign-out-alt text-danger"></span> Cerrar sesión</button>
                    </div>
                  </form>
                </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
</nav>