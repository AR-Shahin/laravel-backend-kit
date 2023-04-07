
@extends('layouts.backend_master')
@section('title', 'Admin Create')
@push('css')

@endpush
@section('master_content')
<div class="container">
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-3 my-2">
                <input type="text" class="form-control" name="name">
            </div>
            <div class="col-md-3 my-2">
                <input type="email" class="form-control" name="email">
            </div>
            <div class="col-md-3 my-2">
                <input type="password" class="form-control" name="password">
            </div>
            <div class="col-md-3 my-2">
                <select name="role" id="" class="form-control">
                    <option value="">Select Role</option>
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 my-2">
                <button class="btn btn-sm btn-success">Submit</button>
            </div>
        </div>
    </form>
</div>

@endsection

@push('script')


<script>

</script>
@endpush
