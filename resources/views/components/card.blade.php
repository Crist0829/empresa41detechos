<div {{$attributes->merge(['class'=>"card shadow-sm m-3"])}}>
    <div class="d-flex flex-column align-items-center p-4 pt-2 pb-0">
        <h2 class="text-center m-2">{{$title ?? ''}}</h2>
        {{$header_content ?? ''}}
    </div>
    <div class="card-body">
        {{$slot}}
    </div>
</div>