
@extends('layouts.backend_master')
@section('title', 'Permission')
@push('css')
<x-utility.datatable-css/>
@endpush
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Permission</h4>
        <a data-toggle="modal" data-target="#addModal" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Permission</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="permissionTable">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->display_name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td>
                        <a data-toggle="modal" data-target="#editModal_{{ $permission->id }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>

                           <form action="{{ route('admin.permission.delete', $permission->id) }}" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick=" return confirm('Are you Sure Delete This Data?')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                           </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("backend.settings.permission.modal._create")
@include("backend.settings.permission.modal._edit",["permissions" => $permissions])

@endsection

@push('script')
<x-utility.datatable-js/>
<script>
   $('#permissionTable').DataTable();

</script>
@endpush
