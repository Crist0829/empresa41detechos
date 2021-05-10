<div class="mb-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link {{$stocknav ?? 'text-white'}} vib-t" aria-current="page" href="{{route('stock')}}">Stock</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link {{$ingreso ?? 'text-white'}} vib-t" href="{{route('stockCreate')}}">Ingreso</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{$egreso ?? 'text-white'}} vib-t" href="{{route('stockEdit')}}">Egreso</a>
        </li>
      </ul>
</div>