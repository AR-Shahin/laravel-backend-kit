@extends('layouts.backend_master')
@section('title','Admin Profile')
@section('master_content')
<section class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-md-3">
            <div class="card card-primary card-outline">
               <div class="card-body box-profile">
                  <div class="text-center">
                     <img class="profile-user-img img-fluid img-circle" src="{{ asset('backend') }}/dist/img/user4-128x128.jpg" alt="User profile picture">
                  </div>
                  <h3 class="profile-username text-center">{{ $admin->name }}</h3>
                  <p class="text-muted text-center">{{ $admin->roles[0]->name }}</p>
                  <ul class="list-group list-group-unbordered mb-3">
                     <li class="list-group-item">
                        <b>Created</b> <a class="float-right">{{ $admin->created_at->format("Y-m-d") }}</a>
                     </li>
                     <li class="list-group-item">
                        <b>Following</b> <a class="float-right">543</a>
                     </li>
                     <li class="list-group-item">
                        <b>Friends</b> <a class="float-right">13,287</a>
                     </li>
                  </ul>
                  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
               </div>
            </div>
            <div class="card card-primary">
               <div class="card-header">
                  <h3 class="card-title">About Me</h3>
               </div>
               <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Education</strong>
                  <p class="text-muted">
                     B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>
                  <hr>
                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                  <p class="text-muted">Malibu, California</p>
                  <hr>
                  <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                  <p class="text-muted">
                     <span class="tag tag-danger">UI Design</span>
                     <span class="tag tag-success">Coding</span>
                     <span class="tag tag-info">Javascript</span>
                     <span class="tag tag-warning">PHP</span>
                     <span class="tag tag-primary">Node.js</span>
                  </p>
                  <hr>
                  <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
               </div>
            </div>
         </div>
         <div class="col-md-9">
            <div class="card">
               <div class="card-header p-2">
                  <ul class="nav nav-pills">
                     <li class="nav-item"><a class="nav-link @if (session('tab_status') == "timeline")
                        active
                        @endif" href="#timeline" data-toggle="tab">Timeline</a></li>
                     <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab">Profile</a></li>
                     <li class="nav-item"><a class="nav-link @if (session('tab_status') == "password")
                        active
                        @endif" href="#password" data-toggle="tab">Password</a></li>
                  </ul>
               </div>
               <div class="card-body">
                  <div class="tab-content">

                     <div class="tab-pane @if (session('tab_status') == "timeline")
                     active
                     @endif" id="timeline">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Error placeat facilis accusamus inventore iure, voluptatibus enim tenetur dolorem omnis iusto voluptate maxime unde rem soluta facere magnam nesciunt aperiam quam, obcaecati doloremque nostrum deserunt molestiae optio similique! Libero, recusandae alias.
                     </div>
                     <div class="tab-pane @if (session('tab_status') == "password")
                     active
                     @endif" id="password">
                        @foreach ($errors as $error)
                            <p class="text-danger">{{ $error }}</p>
                        @endforeach

                        @if(session("status"))
                            <span class="text-danger">{{ session("status") }}</span>
                        @endif
                        <form class="form-horizontal" method="post" action="{{ route('admin.profile.update_password') }}">
                            @csrf
                           <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Old Password</label>
                              <div class="col-sm-10">
                                 <input type="password" class="form-control"  name="old_password" value="{{ old("old_password") }}" >
                              </div>
                            @error("old_password")
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control"  name="password" >
                              </div>
                              @error("password")
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                           </div>
                           <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Re Enter</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control"  name="password_confirmation" >
                            </div>
                            @error("password_confirmation")
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                         </div>
                           <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                 <button type="submit" class="btn btn-success btn-sm">Update Password</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class="tab-pane @if (session('tab_status') == "profile")
                     active
                     @endif" id="profile">
                        <form class="form-horizontal" method="post" action="{{ route("admin.profile.update_profile") }}">
                            @csrf
                           <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                 <input type="text" class="form-control" id="inputName" name="name" value="{{ $admin->name }}">
                              </div>
                           </div>
                           <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                 <input type="email" class="form-control" id="inputEmail" value="{{ $admin->email }}" readonly>
                              </div>
                           </div>

                           <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                 <button type="submit" class="btn btn-success btn-sm">Update</button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</section>
@stop
