<div {{$attributes->merge(['class' => 'row m-4 bg-dark p-2 rounded'])}}>

    <h3 class="text-center text-white m-3">{{$title ?? ''}}</h3>


    {{$slot}}

</div>