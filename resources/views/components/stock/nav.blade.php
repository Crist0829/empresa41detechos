<div class="mb-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link {{$stocknav ?? 'text-white'}} vib-t" aria-current="page" href="{{route('stock')}}">
            <span>Mostrar</span>
             <span class="fas fa-eye m-1">
            </span>
          </a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link {{$ingreso ?? 'text-white'}} vib-t" href="{{route('stockCreate')}}">
            <span>Cargar</span>
             <span class="fas fa-plus m-1">
            </span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$egreso ?? 'text-white'}} vib-t" href="{{route('stockEdit')}}">
            <span>Retirar</span>
             <span class="fas fa-minus m-1">
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