<div class="mb-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link {{$show ?? 'text-white'}} vib-t" aria-current="page" href="{{route('proveedoresIndex')}}">
            <span>Mostrar</span>
             <span class="fas fa-eye m-1">
            </span>
          </a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link {{$create ?? 'text-white'}} vib-t" href="{{route('proveedoresCreate')}}">
            <span>Cargar</span>
            <span class="fas fa-plus m-1">
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$alerts ?? 'text-white'}} vib-t" href="{{route('stockEdit')}}">
            <span>Alertas</span>
            <span class="fas fa-bell m-1">
            </span>
          </a>
        </li>
      </ul>
</div>