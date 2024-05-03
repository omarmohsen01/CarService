@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-lg-3">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Edit {{ $model->brand->name }}({{ $model->code }})</h4>
                      </div>
                   </div>
                   <div class="iq-card-body">
                        <form method="POST" action="{{ route('dashboard.models.update',$model->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <div class="add-img-user profile-img-edit">
                                <img class="profile-pic img-fluid" src="{{ asset('storage/'.$model->image) }}">
                                <div class="p-image">
                                    <a href="#" class="upload-button btn iq-bg-primary">File Upload</a>
                                    <input class="file-upload" value="{{ $model->image }}" type="file" name="image" accept="image/*">
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
                         <h4 class="card-title">Edit Model Information</h4>
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
                                    <label for="fname">Model Code:</label>
                                    <input type="text" class="form-control" name="code" id="fname"
                                        placeholder="Model Code" value="{{ $model->code }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fname">Brand:</label>
                                    <select class="custom-select" name="brand_id" id="year" placeholder="Select Brand">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $brand->id==$model->brand_id?'selected':'' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fname">Manufacturing Year:</label>
                                    <select class="custom-select" name="manufacturing_year" id="year" placeholder="Select Year">
                                        <option value="">Select Year</option>
                                        @for ($year = date('Y'); $year >= 1950; $year--)
                                            <option value="{{ $year }}" {{ $year==$model->manufacturing_year?'selected':'' }}>{{ $year }}</option>
                                        @endfor
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
