@extends('layouts.backend_master')
@section('title','Admin Profile')
@section('master_content')

<div class="row justify-content-center pt-4">
    <div class="col-md-6">
        <h4 class="text-info text-center">Update Profile</h4>
        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf
            <div class="my-2">
                <label for="">Name : </label>
                <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-2">
                <label for="">Email : </label>
                <input type="text" class="form-control" name="email" value="{{ $admin->email }}">
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="my-2">
                <button class="btn btn-sm btn-success btn-block">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@stop
