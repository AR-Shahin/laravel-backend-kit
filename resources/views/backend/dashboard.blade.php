@extends('layouts.backend_master')
@section('title','Admin Dashboard')
@section('master_content')
    @role("Admin")

   {{ \Laratrust::hasRole('Viewer')}}

   admin
   {{ checkAdminCanSee() }}
    @endrole
    @role("Viewer")

   viewer
    @endrole


    {{ checkAdminCanSee() }}
@stop
