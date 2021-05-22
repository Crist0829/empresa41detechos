<div class="mb-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link {{$remitos ?? 'text-white'}} vib-t" aria-current="page" href="{{route('comercioRemitos')}}">Remitos</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link {{$facturacion ?? 'text-white'}} vib-t" href="{{route('comercioFacturacion')}}">Facturación</a>
        </li>
      </ul>
</div>