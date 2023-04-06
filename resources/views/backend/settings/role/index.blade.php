
@extends('layouts.backend_master')
@section('title', 'Role')
@push('css')
{{-- <x-utility.data-table-css/> --}}
@endpush
@section('master_content')
<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">
        <h4 class="card-title">Manage Role</h4>
        <a href="{{ route('admin.role.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add New Role</a>
        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered" id="RoleTable">
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
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a href="{{ route('admin.role.edit',$role->id) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                           <form action="{{ route('admin.role.delete', $role->id) }}" class="d-inline" method="POST">
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


@endsection

@push('script')
{{-- <x-utility.data-table-js/> --}}
<script>
   $('#RoleTable').DataTable();

</script>
@endpush
