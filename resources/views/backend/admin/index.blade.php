
@extends('layouts.backend_master')
@section('title', 'Admin')
@push('css')
<x-utility.datatable-css/>
@endpush
@section('master_content')
<div class="container">
    <table class="table table-sm table-bordered" id="table_id">
        <thead>
            <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($admins as $admin)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>{{ $admin->email }}</td>
                <th>Action</th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@push('script')

<x-utility.datatable-js/>
<script>
   $('#table_id').DataTable();
</script>
@endpush
