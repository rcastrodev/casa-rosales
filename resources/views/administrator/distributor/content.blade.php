@extends('adminlte::page')
@section('title', 'Distribuidor')
@section('content_header')
    <div class="d-flex">
        <h1 class="mr-3">Distribuidor</h1>
    </div>
@stop
@section('content')
@isset($section_2)
<section>
    <form action="{{ route('distributor.update') }}" method="post" class="row mt-5 mb-5" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$section_2->id}}">
        <div class="col-sm-12 col-md-2">
            <label for="">Contenido</label>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <input type="text" name="content_1" class="form-control" value="{{$section_2->content_1}}">
            </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <input type="text" name="content_2" class="form-control" value="{{$section_2->content_2}}">
            </div>
        </div>
        <div class="col-sm-12 row image-delete">
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <input type="file" name="image" class="form-control-file mb-3">
                    @if(Storage::disk('public')->exists($section_2->image)) 
                        <div class="position-relative">
                            <button class="btn btn-danger image rounded-circle far fa-trash-alt position-absolute" 
                            data-url="{{ route('content.destroy-image', ['id'=> $section_2->id, 'reg' => 'image']) }}"  style="top: -10px; right: 0;"></button>

                            <img src="{{ asset($section_2->image) }}" alt="" class="img-fluid"> 
                        </div>  
                    @endif
                </div> 
            </div>  
        </div>
        <div class="text-right col-sm-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
</section>
@endisset
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('js/axios.js') }}"></script>
    <script>
        function imgDelete(e)
        {
            element = e.target
            if(element.classList.contains('form-control-file')) return undefined 

            e.preventDefault()
            if(element.classList.contains('image')){
                axios.delete(element.dataset.url)
                    .then(r => {
                        element.closest('div').remove()
                    })
                    .catch(e => console.error(new Error(e)))
            }
        }

        let sections = document.querySelectorAll('.image-delete')
        if (sections) {
            sections.forEach(element => {
                element.addEventListener('click', imgDelete)
            })     
        }
    </script>
@stop

