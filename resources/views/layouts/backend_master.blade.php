@extends('layouts.backend_app')

@section('app_content')
    <div class="wrapper">

        <!-- Preloader -->
        @includeIf('backend.includes.preloader')

        <!-- Navbar -->
        @includeIf('backend.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @includeIf('backend.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            <!-- /.content-header -->
            @if (session('message'))
                <div class="alert alert-{{ session('type') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <!-- Main content -->
            <section class="content pt-3">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <!-- All content goes form here -->

                    @yield('master_content')

                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        @includeIf('backend.includes.footer')
    </div>
@endsection
