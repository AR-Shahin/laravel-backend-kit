
@extends('layouts.backend_master')
@section('title', 'Admin')
@push('css')
<x-utility.datatable-css/>
@endpush
@section('master_content')
<div class="container">
    <table class="table table-sm table-bordered data-table text-centerd" id="table_id">
        <thead>
            <tr>
                <th width="2%"><input type="checkbox"></th>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody class="text-center">

        </tbody>
    </table>
</div>

@endsection

@push('script')
<x-utility.datatable-js/>
<script>
      $(function () {
    var table = $('.data-table').DataTable({
        "processing": true,
        "retrieve": true,
        "serverSide": true,
        'paginate': true,
        'searchDelay': 700,
        "bDeferRender": true,
        "responsive": true,
        "autoWidth": true,
        "order": [ [0, 'desc'] ],
        ajax: "{{ route('admin.index') }}",
        columns: [
            {data: '#',orderable: false,},
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'roles[0].name', name: 'roles'},
            {data: 'actions', name: 'actions',orderable: false,},
        ],
    });
  });
</script>

@endpush
