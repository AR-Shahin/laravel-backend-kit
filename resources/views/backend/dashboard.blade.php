@extends('layouts.backend_master')
@section('title','Admin Dashboard')
@push('css')
{!! midia_css() !!}
@endpush
@section('master_content')

<div class="row mt-5">
    <div class="col-md-6">
        <form action="{{ route('media_upload') }}" enctype="multipart/formdata" method="POST">
            @csrf
            <div class="my-2">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="my-2">
                <label for="">Image</label>
                <div class="file-select-name" id="noFile">No file chosen...</div>
                <div class="input-group">
                    <div class="custom-file midia-toggle" data-input="my-file">
                        <input class="custom-file-input" type="text" id="my-file" name="image">
                        <label class="custom-file-label" id="label_file" for="exampleInputFile">Choose file</label>
                    </div>
                </div>
            </div>

            <div class="my-2">
                <button class="btn btn-sm btn-success">Submit</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <form action="{{ route('csv_upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group">
                <input type="file" class="form-control" name="csv">
                <button class="btn btn-sm btn-success">Upload</button>
            </div>
        </form>
    </div>
    <hr>

    <table class="table table-sm table-bordered">
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Image</th>
        </tr>
        @foreach ($foos as $foo)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $foo->name }}</td>
                <td><img src="{{ $foo->image }}" alt="" width="100px"></td>
            </tr>
        @endforeach
    </table>
</div>

@stop


@push('script')
{!! midia_js() !!}
<script>

	$(".midia-toggle").midia({
    title: 'Media Manager',
    base_url: window.location.origin,
    onChoose: function() {
        var path = $('#my-file').val()
        $('#label_file').text(path)
        $('#noFile').html(path).css('color','green');
    }
    });
</script>
@endpush


