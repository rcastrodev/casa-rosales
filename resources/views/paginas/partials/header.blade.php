<header class="header py-2 d-sm-none d-md-block bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-12 col-md-6 d-flex align-items-center flex-wrap text-white">
                        <span class="mb-xs-2 mb-md-0 me-4">
                            <i class="fas fa-phone-alt text-white font-size-13 me-1 text-white"></i> 
                            @php $phone = Str::of($data->phone1)->explode('|') @endphp
                            @if (count($phone) == 2)
                                <a href="tel:{{$phone[0]}}" class="text-white text-decoration-none font-size-13 underline">{{ $phone[1] }}</a>
                            @else 
                                <a href="tel:{{$data->phone1}}" class="text-white text-decoration-none font-size-13 underline">{{ $data->phone1 }}</a>
                            @endif
                        </span>
                        <a href="mailto:{{ $data->email }}" class="mb-xs-2 mb-md-0 text-white text-decoration-none font-size-13 underline">
                            <i class="fas fa-envelope text-white font-size-13 me-1"></i> {{ $data->email }}
                        </a>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-end align-items-center redes-sociales">
                        <a href="{{$data->facebook}}" class="font-size-13"><i class="fab fa-facebook-f text-white"></i></a>
                        <span class="mx-2 text-white">|</span>
                        <a href="{{$data->instagram}}" class=""><i class="fab fa-instagram font-size-13 text-white"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light w-100">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset($data->logo_header) }}" alt="" class="img-fluid logo-header">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end text-uppercase" id="navbarNav">
            <ul class="navbar-nav position-relative align-items-center">
                <li class="nav-item @if(Request::is('/')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('/')) active @endif" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item @if(Request::is('empresa')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('empresa')) active @endif" href="{{ route('empresa') }}">Empresa</a>
                </li>
                <li class="nav-item @if(Request::is('productos') || Request::is('producto/*') || Request::is('categorias') || Request::is('categoria/*')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('productos') || Request::is('producto/*') || Request::is('categorias') || Request::is('categoria/*')) active @endif" href="{{ route('categorias') }}">Productos</a>
                </li>    
                <li class="nav-item @if(Request::is('servicios') || Request::is('servicio/*')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('servicios') || Request::is('servicio/*')) active @endif" href="{{ route('servicios') }}">Servicios</a>
                </li>                
                <li class="nav-item @if(Request::is('solicitud-de-presupuesto')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('solicitud-de-presupuesto')) active @endif" href="{{ route('solicitud-de-presupuesto') }}" >Solicitud de presupuesto</a>
                </li>
                <li class="nav-item @if(Request::is('contacto')) position-relative @endif">
                    <a class="nav-link font-size-13 text-dark @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>  
