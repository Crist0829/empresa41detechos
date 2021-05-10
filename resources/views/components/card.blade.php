<div {{$attributes->merge(['class'=>"card shadow-sm m-3"])}}>

    <div class="card-header d-flex flex-column align-items-center">
        <h3 class="text-center m-0">{{$title ?? ''}}</h3>
        {{$header_content ?? ''}}
    </div>

    <div class="card-body">
        {{$slot}}
    </div>

</div>