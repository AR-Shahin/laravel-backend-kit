
@extends('layouts.backend_master')
@section('title', 'Category')
@section('master_content')
<div class="container">

    @foreach ($admins as $admin)
<!-- Modal -->
<div class="modal fade" id="exampleModal_{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{ $admin->name }} -> {{ $admin->email }}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
    @endforeach


    <table id="table_id"  class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a data-toggle="modal" class="btn btn-sm btn-success" data-target="#exampleModal_{{ $admin->id }}">Edit</a>
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
