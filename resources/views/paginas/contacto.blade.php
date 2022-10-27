@extends('paginas.partials.app')
@section('content')
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.801421910694!2d-58.40445208262378!3d-34.7220996922711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccd1321c2105d%3A0xb457da44869be2a6!2sAv.%20Coronel%20Le%C3%B3nardo%20Rosales%201267%2C%20B1826AMK%20Remedios%20de%20Escalada%2C%20Provincia%20de%20Buenos%20Aires%2C%20Argentina!5e0!3m2!1ses!2sve!4v1633288146759!5m2!1ses!2sve" height="464" style="border:0; width:100%;" allowfullscreen="" loading="lazy" ></iframe>
<div class="my-5">
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
        <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
            <strong>{{ Session::get('mensaje') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-12 col-md-4 font-size-18">
                    <div class="d-flex mb-2">
                        <i class="fas fa-map-marker-alt color-primario d-block me-2 text-primary"></i>
                        <address class="d-block m-0" style="color:#333333;">{{ $data->address }}</address>
                    </div>
                    @php $phone = Str::of($data->phone1)->explode('|') @endphp
                    <div class="d-flex mb-2">
                        <i class="fas fa-phone-alt color-primario d-block me-2 text-primary font-size-20"></i>
                        @if (count($phone) == 2)
                            <a href="tel:{{$phone[0]}}" class=" text-decoration-none underline" style="color:#333333;">{{$phone[1]}}</a>
                        @else 
                            <a href="tel:{{ $data->phone1}}" class="text-decoration-none underline" style="color:#333333;">{{ $data->phone1}}</a>
                        @endif  
                    </div>
                    @php $phone2 = Str::of($data->phone2)->explode('|') @endphp
                    <div class="d-flex mb-2">
                        <i class="fab fa-whatsapp color-primario d-block me-2 text-primary font-size-20"></i>
                        @if (count($phone2) == 2)
                            <a href="tel:{{$phone2[0]}}" class=" text-decoration-none underline" style="color:#333333;">{{$phone2[1]}}</a>
                        @else 
                            <a href="tel:{{ $data->phone2}}" class="text-decoration-none underline" style="color:#333333;">{{ $data->phone2}}</a>
                        @endif  
                    </div>
                    <div class="d-flex mb-2">
                        <i class="fas fa-envelope color-primario d-block me-2 text-primary"></i><span class="d-block" style="color:#333333;">{{ $data->email }}</span>                        
                    </div>
                </div>          
                <div class="col-sm-12 col-md-8">
                    <img src="{{ asset('images/Mesadetrabajo2.png') }}" class="d-block mx-auto img-fluid" style="max-width: 600px;">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
