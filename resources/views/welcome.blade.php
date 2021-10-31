@extends('layouts.backend_app')


@section('app_content')

<h1 class="text-center my-5">Laravel 8 Template</h1>
<hr>
<div class="text-center">
    <a href="{{ route('admin.login') }}" class="btn btn-sm btn-success"><i class="fa fa-user mr-1"></i> Admin Login</a>
    {{ greetings() }}
</div>
@stop
