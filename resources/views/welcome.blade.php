@extends('layouts.frontend_app')



@section('app_content')

    <h1 class="text-center my-5">Laravel 10 Template</h1>
    <hr>
    <div id="google_translate_element"></div>
    <div class="text-center">
        <a href="{{ route('admin.login') }}" class="btn btn-sm btn-success"><i class="fa fa-user mr-1"></i> Admin Login</a>
        {{ greetings() }}
    </div>





@stop

