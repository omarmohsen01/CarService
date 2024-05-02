@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-3">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Edit '{{ $user->first_name }}{{ $user->last_name }}' Information</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                        <form method="POST" action="{{ route('dashboard.users.update',$user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" alt="profile-pic" src="{{ asset('storage/'.$user->image) }}">
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">File Upload</a>
                                    <input class="file-upload" value="{{ $user->image }}" type="file" name="image" accept="image/*">
                                </div>
                                </div>
                            <div class="img-extension mt-3">
                                <div class="d-inline-block align-items-center">
                                    <span>Only</span>
                                    <a href="javascript:void();">.jpg</a>
                                    <a href="javascript:void();">.png</a>
                                    <a href="javascript:void();">.jpeg</a>
                                    <span>allowed</span>
                                </div>
                            </div>
                            </div>
                   </div>
                </div>
          </div>
          <div class="col-lg-9">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Edit User Information</h4>
                      </div>
                   </div>
                   @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                   <div class="iq-card-body">
                      <div class="new-user-info">
                            <div class="row">
                               <div class="form-group col-md-6">
                                  <label for="fname">First Name:</label>
                                  <input type="text" class="form-control" value="{{ $user->first_name }}" name="first_name" id="fname" placeholder="First Name">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="lname">Last Name:</label>
                                  <input type="text" class="form-control" value="{{ $user->last_name }}" name="last_name" id="lname" placeholder="Last Name">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="mobno">Mobile Number:</label>
                                  <input type="text" class="form-control" value="{{ $user->phone }}" name="phone" id="mobno" placeholder="Mobile Number">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="email">Email:</label>
                                  <input type="email" class="form-control" value="{{ $user->email }}" name="email" id="email" placeholder="Email">
                               </div>
                            </div>
                            <hr>
                            {{-- <h5 class="mb-3">Security</h5>
                            <div class="row">
                               <div class="form-group col-md-6">
                                  <label for="pass">Password:</label>
                                  <input type="password" name="password" class="form-control" id="pass" placeholder="Password">
                               </div>
                               <div class="form-group col-md-6">
                                  <label for="rpass">Repeat Password:</label>
                                  <input type="password" class="form-control" id="rpass" placeholder="Repeat Password ">
                               </div>
                            </div>
                            <div class="checkbox">
                               <label><input class="mr-2" type="checkbox">Enable Two-Factor-Authentication</label>
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Update</button>
                         </form>
                      </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
