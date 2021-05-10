<nav class="navbar navbar-primary navbar-theme-primary px-4 col-12 d-md-none">
  <a class="navbar-brand me-lg-5" href="">
     <img src="{{asset('/assets/img/brand-logo.png')}}" alt="Logo empresa">
  </a>
  <div class="d-flex align-items-center">
      <button class="navbar-toggler d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fas fa-align-justify text-white m-2"></span>
      </button>
  </div>
</nav>

      <nav id="sidebarMenu" class="sidebar d-md-block bg-dark text-white collapse" data-simplebar>
<div class="sidebar-inner px-4 pt-3">
  <div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
    <div class="d-flex align-items-center">
      <div class="user-avatar lg-avatar me-4">
        <img src="../../assets/img/team/profile-picture-3.jpg" class="card-img-top rounded-circle border-white"
          alt="">
      </div>
      <div class="d-block">
        <h2 class="h6">{{Auth::user()->name}}</h2>
        <a href="../../pages/examples/sign-in.html" class="btn btn-secondary text-dark btn-xs"><span
            class="me-2"><span class="fas fa-sign-out-alt"></span></span>Cerrar sesión</a>
      </div>
    </div>
    <div class="collapse-close d-md-none">
      <a href="#sidebarMenu" class="fas fa-times" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
        aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
    </div>
  </div>
  <ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item {{$inicio ?? ''}}">
      <a href="{{route('dashboard')}}" class="nav-link bg-dark nv-color d-flex align-items-center">
        <span class="">
          <img src="{{asset('assets/img/brand/brand-logo.png')}}" width="200" alt="Logo">
        </span>
      </a>
    </li>

    <li class="nav-item {{$gestion ?? ''}} vib">
      <span
        class="nav-link collapsed  d-flex justify-content-between align-items-center"
        data-bs-toggle="collapse" data-bs-target="#gestion">
        <span>
          <span class="sidebar-icon"><span class="fas fa-tools"></span></span>
          <span class="sidebar-text">Gestión</span>
        </span> 
        <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
      </span>
      <div class="multi-level collapse "
        role="list" id="gestion" aria-expanded="false">
        <ul class="flex-column nav">

          <li class="nav-item {{$stock ?? ''}}">
            <a class="nav-link" href="{{route('stock')}}">
              <span class="sidebar-text">Stock</span>
            </a>
          </li>
          <li class="nav-item {{$comercial ?? ''}}">
            <a class="nav-link" href="{{route('comercioIndex')}}">
              <span class="sidebar-text">Comercial</span>
            </a>
          </li>
          
          <li class="nav-item {{$proveedores ?? ''}}">
            <a class="nav-link" href="{{route('proveedoresIndex')}}">
              <span class="sidebar-text">Proveedores</span>
            </a>
          </li>

          <li class="nav-item {{$clientes ?? ''}}">
            <a class="nav-link" href="{{route('clientesIndex')}}">
              <span class="sidebar-text">Clientes</span>
            </a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item {{$plataforma ?? ''}} vib">
      <span
        class="nav-link collapsed  d-flex justify-content-between align-items-center"
        data-bs-toggle="collapse" data-bs-target="#users">
        <span>
          <span class="sidebar-icon"><span class="fas fa-tablet"></span></span>
          <span class="sidebar-text">Plataforma</span>
        </span> 
        <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
      </span>
      <div class="multi-level collapse "
        role="list" id="users" aria-expanded="false">
        <ul class="flex-column nav">

          <li class="nav-item {{$usuarios ?? ''}}" >
            <a class="nav-link" href="{{route('adminusuarios')}}">
              <span class="sidebar-icon"><span class="fas fa-users"></span></span>
              <span class="sidebar-text">Usuarios</span>
            </a>
          </li>
          
        </ul>
      </div>
    </li>
  </ul>
</div>
</nav>