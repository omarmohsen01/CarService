@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-3">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Edit '{{ $brand->name }}'</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                        <form method="POST" action="{{ route('dashboard.brands.update',$brand->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" alt="profile-pic" src="{{ asset('storage/'.$brand->image) }}">
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">File Upload</a>
                                    <input class="file-upload" value="{{ $brand->image }}" type="file" name="image" accept="image/*">
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
                         <h4 class="card-title">Edit Brand Information</h4>
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
                                <div class="form-group col-md-6">
                                    <label for="fname">Brand Name:</label>
                                    <input type="text" class="form-control" name="name" id="fname"
                                        placeholder="Brand Name" value="{{ $brand->name }}">
                                </div>
                               <div class="form-group col-md-6">
                                <label for="fname">Country Of Manufacture:</label>
                                    <select class="custom-select" name="country_of_manufacture" id="country"
                                        placeholder="Country Of Manufacture">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country }}"  {{ $country == $brand->country_of_manufacture?'selected':'' }}>{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
