@extends('paginas.partials.app')
@section('content')
@isset($sliders)
	@if(count($sliders))
		<div id="sliderEmpresa" class="carousel slide position-relative" data-bs-ride="carousel">
			<div class="contenedor-breadcrumb position-absolute w-100" style="background-color: #f8f9fa8a !important; top:0; z-index:100;">
				<div class="container">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb text-uppercase py-2 font-size-13">
							<li class="breadcrumb-item">
								<a href="{{ route('index') }}" class="text-decoration-none text-dark fw-bold">Inicio</a>
							</li>
							<li class="breadcrumb-item active text-dark" aria-current="page">Empresa</li>
						</ol>
					</nav>  
				</div>
			</div>
			<div class="carousel-indicators d-sm-none d-md-block">
				@foreach ($sliders as $k => $slide)
					<button type="button" data-bs-target="#sliderEmpresa" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
				@endforeach
			</div>
			<div class="carousel-inner h-100">
				@foreach ($sliders as $k => $slide)
					<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: linear-gradient(rgb(0 0 0 / 48%),rgba(0, 0, 0, 0.1)), url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
						<div class="carousel-caption w-75">
							<h2 class="font-size-50 fw-bold">{{ $slide->content_1 }}</h2>
						</div>
					</div>		
				@endforeach
			</div>
		</div>
	@endif	
@endisset
@isset($section2)
	@if($section2)
		<section id="section_2" class="py-sm-2 pt-md-5">
			<div class="container py-sm-0 py-md-3">
				<div class="row">
					<div class="col-sm-12 col-md-6">{!! $section2->content_1 !!}</div>
					@if ($section2->image)
						<div class="col-sm-12 col-md-6">
							<img src="{{ asset($section2->image) }}" class="img-fluid">
						</div>
					@endif
				</div>
			</div>
		</section>
	@endif	
@endisset
@isset($distributor)
	@includeIf('paginas.partials.distrubutor', ['distributor' => $distributor])
@endisset
@endsection

       
