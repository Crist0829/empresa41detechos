<!DOCTYPE html>
<html lang="es">
<head> 
    @livewireStyles
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Primary Meta Tags -->
<title>{{$title}}</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="title" content="Volt Free Bootstrap Dashboard - Sign in page">

<!--Interactividad-->
<link rel="stylesheet" href="{{asset('/css/interactive.css')}}">

<!-- Fontawesome -->
<link type="text/css" href="{{asset('/vendor/fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">

<!-- Sweet Alert -->
<link type="text/css" href="{{asset('/vendor/sweetalert2/dist/sweetalert2.min.css')}}" rel="stylesheet">

<!-- Notyf -->
<link type="text/css" href="{{asset('/vendor/notyf/notyf.min.css')}}" rel="stylesheet">

<!-- Volt CSS -->
<link type="text/css" href="{{asset('/css/app.css')}}" rel="stylesheet">

<!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->

</head>

<body class={{$body ?? ''}}>

    <!-- NOTICE: You can use the _analytics.html partial to include production code specific code & trackers -->
    

    {{$slot}}

    <!-- Core -->
<script src="{{asset('/vendor/popperjs/core/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- Vendor JS -->
<script src="{{asset('/vendor/onscreen/dist/on-screen.umd.min.js')}}"></script>

<!-- Slider -->
<script src="{{asset('/vendor/nouislider/distribute/nouislider.min.js')}}"></script>

<!-- Smooth scroll -->
<script src="{{asset('/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js')}}"></script>

<!-- Charts -->
<script src="{{asset('/vendor/chartist/dist/chartist.min.js')}}"></script>
<script src="{{asset('/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js')}}"></script>

<!-- Datepicker -->
<script src="{{asset('/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>

<!-- Sweet Alerts 2 -->
<script src="{{asset('/vendor/sweetalert2/dist/sweetalert2.all.min.js')}}"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="{{asset('/vendor/vanillajs-datepicker/dist/js/datepicker.min.js')}}"></script>

<!-- Notyf -->
<script src="{{asset('/vendor/notyf/notyf.min.js')}}"></script>

<!-- Simplebar -->
<script src="{{asset('/vendor/simplebar/dist/simplebar.min.js')}}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="{{asset('/assets/js/volt.js')}}"></script>
@livewireScripts
    
</body>

</html>
