@extends('paginas.partials.app')
@section('content')
@if(count($sliders))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="position-absolute d-sm-none d-md-block" style="width: 50px; height: 50px; background-color: #0c3d6d; top: 30%; z-index: 10;"></div>
		<div class="carousel-indicators d-sm-none d-md-block">
			@foreach ($sliders as $k => $slide)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if (!$k) active @endif" aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner h-100">
			@foreach ($sliders as $k => $slide)
				<div class="carousel-item h-100 @if (!$k) active @endif" style="background-image: linear-gradient(rgb(0 0 0 / 48%),rgba(0, 0, 0, 0.1)), url({{ asset($slide->image) }}); background-repeat: no-repeat; background-size: 100% 100%; background-position: center;">
					<div class="carousel-caption container">
						<div class="w-50 text-start">
							<h2 class="font-size-36" style="font-weight: 300;">{{ $slide->content_1 }}</h2>
							<p class="font-size-30 mb-5" style="font-weight: 200;">{{ $slide->content_2 }}</p>
						</div>
					</div>
				</div>			
			@endforeach
		</div>
	</div>
@endif
@isset($categories)
	<div class="bg-footer">
		<div class="container"><h3 class="text-uppercase p-3 text-primary bg-white d-inline-block mb-0 font-size-25 fw-normal">Categorías</h3></div>
	</div>
	@if(count($categories))
		<section id="categories" class="py-5">
			<div class="container">
				<div class="row">
					@foreach ($categories as $category)
						<div class="col-sm-12 col-md-4 mb-4">
							@includeIf('paginas.partials.categoria', ['category' => $category])
						</div>
					@endforeach
				</div>
			</div>
		</section>
	@endif
@endisset
@isset($distributor)
	@includeIf('paginas.partials.distributor', ['distributor' => $distributor])
@endisset
@endsection
