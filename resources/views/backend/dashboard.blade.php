@extends('layouts.backend_master')
@section('title','Admin Dashboard')
@section('master_content')
@php
    $ps = \App\Models\Product::all();

@endphp

@foreach ($ps as $p)
{{ $p->name }}
<h4> {{ $p->title }}</h4>
    {!! $p->description !!}
@endforeach
<form action="{{ url('api/products') }}" method="POST">
    @csrf
    <input type="text" class="form-control" name="name">
    <input type="hidden" class="form-control" name="price" value="100">
    <textarea name="description" id="summernote" cols="30" rows="10" class="form-control">

    </textarea>
    <button>submit</button>
</form>

<hr>

Lorem ipsum dolor sit amet consectetur adipisicing elit.
@stop

@push('script')
    <script>
        $('#summernote').summernote();

        $('#summernote').summernote({
    callbacks: {
        onImageUpload: function(files) {
            var formData = new FormData();
            formData.append('file', files[0]);
            $.ajax({
                url: '/upload',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#summernote').summernote('insertImage', data.url);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + ': ' + errorThrown);
                }
            });
        }
    }
});
    </script>
@endpush
