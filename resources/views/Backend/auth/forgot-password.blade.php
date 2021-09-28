@extends('layouts.backend_app')

@section('title' ,'Admin Forgot Passeord')


@section('app_content')
<div class="login-page">
    <div class="login-box">
        <div class="login-logo">
          <a href=""><b>Admin </b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('admin.password.email') }}" method="post">

                @csrf
                @if(session('status'))
                <span class="text-success">{{ session('status') }}</span>
                @endisset
              <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" value="admin@mail.com">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              @error('email')
              <span class="text-danger">{{ $message }}</span>
            @enderror
              <div class="row">
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
                <!-- /.col -->
              </div>
            </form>


            <p class="mb-1">
              <a href="{{ route('admin.login') }}">Login</a>
            </p>
            {{-- <p class="mb-0">
              <a href="{{ route('register') }}" class="text-center">Register</a>
            </p> --}}
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>
</div>

@stop
