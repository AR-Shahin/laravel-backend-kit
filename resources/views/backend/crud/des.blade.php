
@extends('layouts.backend_master')
@section('title', 'Category')
@section('master_content')
<div class="container">

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('d')}}" method="POST">
            @csrf
            <input type="text" value="" name="title">
            <br>
            <select name="department_id" id="" class="form-control">
                <option value="">Select</option>
                @foreach ($departments as $d)
                <option value="{{ $d->id }}" >{{ $d->title }}</option>
                @endforeach
            </select>
            <button>Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


    @foreach ($designations as $des)
<!-- Modal -->
<div class="modal fade" id="exampleModal_{{ $des->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('des',$des->id) }}" method="POST">
            @csrf
            <input type="text" value="{{ $des->title }}" name="title">
            <br>
            <select name="department_id" id="" class="form-control">
                <option value="">Select</option>
                @foreach ($departments as $d)
                <option value="{{ $d->id }}"
                    @if ($d->id == $des->department_id)
                        selected
                    @endif
                    >{{ $d->title }}</option>
                @endforeach
            </select>
            <button>Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

    @endforeach

    <a data-toggle="modal" class="btn btn-sm btn-success" data-target="#createModal">Create</a>
    <table id="table_id"  class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Dept</th>
                <th>Column 2</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($designations as $des)
                <tr>
                    <td>{{ $des->department->title }}</td>
                    <td>{{ $des->title }}</td>
                    <td>
                        <a data-toggle="modal" class="btn btn-sm btn-success" data-target="#exampleModal_{{ $des->id }}">Edit</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
@push('css')
{{-- <x-utility.datatable-css/> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
@endpush
@push('script')
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
{{-- <x-utility.datatable-js/> --}}
<script>
   $('#table_id').DataTable();
</script>
@endpush
