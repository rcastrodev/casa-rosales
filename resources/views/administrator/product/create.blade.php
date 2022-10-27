@extends('adminlte::page')
@section('title', 'Crear producto')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Crear producto</h1>
        <a href="{{ route('product.content') }}" class="btn btn-sm btn-primary">ver productos</a>
    </div>
@stop
@section('content')
<div class="row">
    @includeIf('administrator.partials.mensaje-exitoso')
    @includeIf('administrator.partials.mensaje-error')
</div>
<div class="card card-primary">
    <div class="card-header"></div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('product.content.store') }}" method="post" enctype="multipart/form-data">
        <div class="card-body row">
            @csrf
            <div class="form-group col-sm-12 col-md-7">
                <label for="">Nombre del producto</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nombre del producto">
            </div>
            <div class="form-group col-sm-12 col-md-2">
                <label for="">Orden</label>
                <input type="text" name="order" value="{{old('order')}}" class="form-control" placeholder="Ej AA BB CC">
            </div>
            <div class="form-group col-sm-12 col-md-3">
                <label for="">Categoría</label>
                <select name="category_id" class="form-control select2">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12 col-md-4">
                <label>Ficha técnica</label>
                <input type="file" name="data_sheet" class="form-control-file">
            </div>   
            <div class="form-group col-sm-12">
                <label for="">Descripción</label>
                <textarea name="description" class="form-control ckeditor" cols="30" rows="2">{{old('description')}}</textarea>
            </div>  
            <div class="form-group col-sm-12">
                <label for="">Normas</label>
                <textarea name="policy" class="form-control ckeditor" cols="30" rows="2">{{old('policy')}}</textarea>
            </div>  
            <div class="col-sm-12 mt-5"><h4>Imágenes de producto</h4></div> 
            <div class="form-group col-sm-12">
                <small>la imagen debe ser al menos 342x258</small>   
            </div>   
            @for ($i = 1; $i <= 6; $i++)
                <div class="form-group col-sm-12 col-md-4">
                    <label for="image{{$i}}">imagen {{$i}}</label>
                    <input type="file" name="images[]" class="form-control-file" id="image{{$i}}">
                </div>           
            @endfor
            <div class="col-sm-12 mt-5"><h4>Imágenes de descripción del producto</h4></div> 
            <div class="form-group col-sm-12 col-md-6">
                <label for="">Imagen Descripción 1 <small>560x160px</small></label>    
                <input type="file" name="extra1" class="form-control-file">
            </div>
            <div class="form-group col-sm-12 col-md-6">
                <label for="">Imagen Descripción 2 <small>560x160px</small></label>
                <input type="file" name="extra2" class="form-control-file">
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        $('document').ready(function(){
            $('.select2').select2()
        })
    </script>
@stop
