@extends('paginas.partials.app')
@section('content')
<div class="contenedor-breadcrumb bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase py-2 font-size-13">
                <li class="breadcrumb-item">
                    <a href="{{ route('index') }}" class="text-decoration-none text-dark fw-bold">Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('categorias') }}" class="text-decoration-none text-dark fw-bold">Productos</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('categoria', ['id' => $product->category->id]) }}" class="text-decoration-none text-dark fw-bold">{{$product->category->name}}</a>
                </li>
                <li class="breadcrumb-item active text-dark" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>  
    </div>
</div>
@isset($product)
    <div class="py-5">
        <div class="container">
            <div class="row">
                <aside class="col-sm-12 col-md-3 d-sm-none d-md-block">
                    @isset($categories)
                        @if (count($categories))
                            <ul class="p-0 font-size-18" style="list-style: none;">
                                @foreach ($categories as $category)
                                    <li class="@if($category->name == $product->category->name) active @endif">
                                        <a href="#" class="toggle d-block p-2 text-decoration-none text-decoration-none text-white">{{ $category->name }}</a>
                                        <ul class="ps-0 {{ ($category->name == $product->category->name) ? '' : 'rd-none' }}" style="list-style: none">
                                            @foreach ($category->products as $p)
                                                <li class="{{ ($p->name == $product->name) ? 'activee' : '' }}">
                                                    <a href="{{ route('producto', ['id'=> $p->id ]) }}" class="text-dark text-decoration-none d-block py-1 ms-4"> {{ $p->name }} </a>
                                                </li>                            
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>            
                        @endif   
                    @endisset
                </aside>
                <section class="producto col-sm-12 col-md-9 font-size-14">
                    <div class="row mb-5">
                        <div class="col-sm-12 col-md-5">
                            <div id="carruselProducto" class="carousel slide carousel-fade border border-light border-2 mb-3" data-bs-ride="carousel" style="">
                                <div class="carousel-inner">
                                    @if (count($product->images))
                                        @foreach ($product->images as $pk => $pv)
                                            <div class="carousel-item @if(!$pk) active @endif">
                                                <img src="{{ asset($pv->image) }}" class="d-block w-100 img-fluid" style="object-fit: cover;
                                                min-width: 100%; max-width: 100%; height: 350px;">
                                            </div>    
                                        @endforeach
                                    @else
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/default.jpg') }}" class="d-block w-100 img-fluid" style="object-fit: cover; min-width: 100%; max-width: 100%;" alt="">
                                        </div>   
                                    @endif
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carruselProducto" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carruselProducto" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div> 
                            @if (count($product->images))
                                <div class="d-sm-none d-md-block">
                                    <ul class="d-flex p-0" style="list-style: none; overflow: hidden;">
                                    @foreach ($product->images as $ip)
                                        <li class="me-2" style="border:1px solid rgba(0, 0, 0, 0.125);">
                                            <img src="{{ asset($ip->image) }}" width="85" height="65" style="object-fit: cover;">
                                        </li>                 
                                    @endforeach
                                    </ul>
                                </div>   
                            @endif
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex flex-column justify-content-between">
                            <div class="">
                                <h1 class="mb-3 font-size-28 fw-bold text-primary">{{ $product->name }}</h1>
                                <div class="font-size-15 mb-md-3 mb-sm-2">{!! Str::limit($product->description, 250);  !!}</div>
                            </div>
                            @if ($product->policy)
                                <div class="mb-4" style="padding-top: 20px; border-top: 1px solid #80808063;">
                                    <h4 class="font-size-20 mb-3">NORMAS</h4>
                                    <div class="font-size-15">{!! $product->policy !!}</div>
                                </div>
                            @endif
                            <div class=""></div>
                            <div class="d-flex justify-content-sm-center justify-content-md-start flex-wrap">
                                @if($product->data_sheet)
                                    <a href="{{ route('ficha-tecnica', ['id'=>$product->id]) }}" class="me-sm-0 me-md-3 mb-sm-3 mb-md-0 mb-sm-4 px-md-5 px-sm-5 btn font-size-15 w-sm-100 w-md-50 fw-bold text-uppercase text-center text-primary" style="border-radius: 10px; border: 1px solid #0C3D6D">ficha técnica</a>       
                                @endif
                                <a href="{{ route('contacto') }}" class="btn text-white bg-footer fw-bold py-2 px-5 text-uppercase font-size-15 w-sm-100 w-md-50" style="border-radius: 10px;">Consultar</a>
                            </div>
                        </div>
                    </div>    
                    @if($product->description)
                        <div class="mb-5">
                            <h5 class="mb-3 p-2 text-uppercase text-white font-size-19 bg-footer text-white fw-normal">DESCRIPCIÓN</h5>
                            <div class="font-size-15 mb-md-4 mb-sm-2">{!! $product->description  !!}</div>
                            <div class="">
                                @if (Storage::disk('public')->exists($product->extra1))
                                    <img src="{{ asset($product->extra1) }}" class="img-fluid d-block mx-auto mb-4">
                                @endif
                                @if (Storage::disk('public')->exists($product->extra2))
                                    <img src="{{ asset($product->extra2) }}" class="img-fluid d-block mx-auto mb-4">
                                @endif
                            </div>
                        </div>                       
                    @endif      
                    @if (count($product->variableProducts))
                        <div class="row mb-5">
                            <div class="col-sm-12 table-responsive">
                                <table id="tableVP" class="table text-center">
                                    <thead class="bg-light font-size-20">
                                        <tr>
                                            <th scope="col" class="fw-light text-uppercase">Espesor</th>
                                            <th scope="col" class="fw-light text-uppercase">Largo</th>
                                            <th scope="col" class="fw-light text-uppercase">Ancho</th>
                                        </tr>
                                    </thead>
                                    <tbody class="font-size-19">
                                        @foreach ($product->variableProducts as $vProduct)
                                            <tr>
                                                <td>{{$vProduct->thickness}}</td>
                                                <td>{{$vProduct->long}}</td>
                                                <td>{{$vProduct->width}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>                  
                    @endif                                
                </section>
            </div>
        </div>
    </div>
@endisset
@endsection
@push('scripts')
    <script src="{{ asset('js/pages/product.js') }}"></script>
@endpush
