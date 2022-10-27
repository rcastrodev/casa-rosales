<footer class="font-size-14 text-sm-center text-md-start bg-footer">
    <div class="row justify-content-between">
        <div class="col-sm-12 col-md-4 py-sm-3 py-md-5 plogo-footer" style="">
            <a href="{{ route('index') }}" class="d-sm-none d-md-block mb-3">
                <img src="{{ asset($data->logo_footer) }}" class="d-block mx-auto" style="max-width: 270px; max-height: 70px;">
            </a>
            <div class="text-center">
                <a href="{{$data->facebook}}" class="pe-2 font-size-13"><i class="fab fa-facebook-f text-white"></i></a>
                <a href="{{$data->instagram}}" class="pe-2"><i class="fab fa-instagram font-size-13 text-white"></i></a>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 py-sm-2 py-md-5 d-sm-none d-md-block">
            <div class="row justify-content-between">
                <div class="col-sm-12">    
                    <div class="row">
                        <div class="col-sm-12">
                            <h6 class="text-uppercase text-white font-weight-600 mb-4">MAPA DEL SITIO</h6>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <a href="{{ route('index') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">Home</a>
                            <a href="{{ route('empresa') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">Empresa</a>
                            <a href="{{ route('productos') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">Productos</a>
                            
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <a href="{{ route('servicios') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">Servicios</a>
                            <a href="{{ route('solicitud-de-presupuesto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">Solicitud de presupuesto</a>
                            <a href="{{ route('contacto') }}" class="d-block text-uppercase text-decoration-none text-light mb-1">Contacto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5 font-size-13 px-sm-3 px-md-0 py-sm-3 py-md-5">
            <h6 class="text-uppercase text-white font-weight-600 mb-4">contacto</h6>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-map-marker-alt text-white d-block me-2"></i>
                        <address class="d-block text-light m-0"> {{ $data->address }}</address>
                    </div>

                </div>
                <div class="col-sm-12 col-md-6">
                    @php $phone = Str::of($data->phone1)->explode('|') @endphp
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-phone-alt text-white d-block me-2"></i>
                        @if(count($phone) == 2)
                            <a href="tel:{{$phone[0]}}" class="text-light text-decoration-none underline">{{ $phone[1] }}</a>
                        @else
                            <a href="tel:{{$data->phone1}}" class="text-light text-decoration-none underline">{{ $data->phone1 }}</a>
                        @endif
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-envelope text-white d-block me-2"></i><span class="d-block"></span>
                        <a href="mailto:{{ $data->email }}" class="text-light text-decoration-none underline">{{ $data->email }}</a>             
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                    <div class="d-flex align-items-center mb-2">
                        <i class="fab fa-whatsapp text-white d-block me-2"></i>
                        @if(count($phone2) == 2)
                            <a href="tel:{{$phone2[0]}}" class="text-light text-decoration-none underline">{{ $phone2[1] }}</a>
                        @else
                            <a href="tel:{{$data->phone2}}" class="text-light text-decoration-none underline">{{ $data->phone2 }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-light py-2" style="border-top: 1px solid #f9f9f9a1;">
        <div class="container"><i class="far fa-copyright"></i> Copyright 2021 Casa Rosales. Todos los derechos reservados</div>
    </div>
</footer>
@if(count($phone2) == 2)
    <a href="https://wa.me/{{$phone2[0]}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>
@else
    <a href="https://wa.me/{{$data->phone2}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>
@endif
