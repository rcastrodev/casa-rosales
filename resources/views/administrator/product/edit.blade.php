@extends('adminlte::page')
@section('title', 'Editar producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Editar producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<form action="{{ route('product.content.update') }}" method="post" enctype="multipart/form-data" class="card card-primary">
    @method('put')
    @csrf
    <input type="hidden" name="id" value="{{ $product->id }}">
    <div class="card-header">Producto</div>
    <!-- /.card-header -->
    <!-- form start -->
    <div class="card-body row">
        <div class="form-group col-sm-12 col-md-7">
            <label for="">Nombre del producto</label>
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Nombre del producto">
        </div>
        <div class="form-group col-sm-12 col-md-2">
            <label for="">Orden</label>
            <input type="text" name="order" value="{{$product->order}}" class="form-control" placeholder="Ej AA BB CC">
        </div>
        <div class="form-group col-sm-12 col-md-3">
            <label for="">Categoría</label>
            <select name="category_id" class="form-control select2">
                @foreach ($categories as $category)
                    <option 
                        value="{{$category->id}}" 
                        @if($category->id == $product->category_id) selected @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        @if ($product->data_sheet)
            <div class="form-group col-sm-12">
                <a href="{{ route('ficha-tecnica', ['id'=> $product->id]) }}" class="btn btn-sm btn-primary rounded-pill" target="_blank">Ficha técnica</a>
                <button class="btn btn-sm rounded-circle btn-danger" id="borrarFicha" data-url="{{ route('borrar-ficha-tecnica', ['id'=> $product->id]) }}">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>          
        @endif
        <div class="form-group col-sm-12 col-md-4">
            <label>Ficha técnica</label>
            <input type="file" name="data_sheet" class="form-control-file">
        </div>  
        <div class="form-group col-sm-12">
            <label for="">Descripción</label>
            <textarea name="description" class="form-control ckeditor" cols="30" rows="2">{{$product->description}}</textarea>
        </div>
        <div class="form-group col-sm-12">
            <label for="">Normas</label>
            <textarea name="policy" class="form-control ckeditor" cols="30" rows="2">{{$product->policy}}</textarea>
        </div>  
        <div class="col-sm-12 mt-5"><h4>Imágenes de producto</h4></div> 
        <div class="form-group col-sm-12">
            <small>la imagen debe ser al menos 342x258</small>   
        </div>   
        @foreach ($product->images as $pi)
            <div class="form-group col-sm-12 col-md-4 ">
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyImgProduct" data-url="{{ route('product-picture.content.destroy', ['id'=> $pi->id]) }}"></button>
                    <img src="{{ asset($pi->image) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
                <label>imagen</label>
                <input type="file" name="images[]" class="form-control-file">
            </div>                    
        @endforeach
        @if ($numberOfImagesAllowed)
            @for ($i = 1; $i <= $numberOfImagesAllowed; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image">imagen</label>
                    <input type="file" name="images[]" class="form-control-file" id="">
                </div>           
            @endfor
        @endif   
        <div class="w-100"></div>
        <div class="col-sm-12 mt-5"><h4>Imágenes de descripción del producto</h4></div> 
        <div class="form-group col-sm-12 col-md-6">
            <label for="">Imagen Descripción 1 <small>560x160px</small></label>
            <input type="file" name="extra1" class="form-control-file">
            @if(Storage::disk('public')->exists($product->extra1))
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyDescriptionImage" data-url="{{ route('product.destroy.descriptionImage', ['id'=> $product->id, 'field' => 'extra1']) }}"></button>
                    <img src="{{ asset($product->extra1) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
            @endif
        </div>
        <div class="form-group col-sm-12 col-md-6">
            <label for="">Imagen Descripción 2 <small>560x160px</small></label>
            <input type="file" name="extra2" class="form-control-file">
            @if(Storage::disk('public')->exists($product->extra2))
                <div class="position-relative">
                    <button class="position-absolute btn btn-sm btn-danger rounded-pill far fa-trash-alt destroyDescriptionImage" data-url="{{ route('product.destroy.descriptionImage', ['id'=> $product->id, 'field' => 'extra2']) }}"></button>
                    <img src="{{ asset($product->extra2) }}" style="max-width: 350px; min-width:350px; max-height:200px; min-height:200px; object-fit: contain;">
                </div>
            @endif
        </div>
    </div>
      <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>
@includeIf('administrator.product.variable-product.index')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('product.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/product/variable-product.js') }}"></script>
    <script>        
        // borrar ficha técnica 
        let borrarFicha = document.getElementById('borrarFicha')
        if (borrarFicha) {
            borrarFicha.addEventListener('click', function(e){
                e.preventDefault()
                axios.delete(this.dataset.url)
                .then(r => {
                    this.closest('div').remove()
                })
                .catch(e => console.error( new Error(e) ))      
            })  
        }

        $('.destroyDescriptionImage').click(function(e) {
            e.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')     
                },
                url: e.target.dataset.url,
                type:'delete',
                success: function (response) {
                    e.target.closest('.position-relative').remove()
                },
                error:function(x,xs,xt){
                    console.log(JSON.stringify(x))
                }
            });
        })
    </script>
@stop

