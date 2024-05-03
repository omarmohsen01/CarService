@extends('layouts.dashboard')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Add Brand Image</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form method="POST" action="{{ route('dashboard.brands.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <div class="add-img-user profile-img-edit">
                                        <img class="profile-pic img-fluid">
                                        <div class="p-image">
                                            <a href="javascript:void();" class="upload-button btn iq-bg-primary">File
                                                Upload</a>
                                            <input class="file-upload" type="file" name="image" accept="image/*">
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
                                <h4 class="card-title"> Brand Information</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <div class="form-group col-md-6">
                                <label for="fname">Brand Name:</label>
                                <input type="text" class="form-control" name="name" id="fname"
                                    placeholder="Brand Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="fname">Country Of Manufacture:</label>
                                <select class="custom-select" name="country_of_manufacture" id="country"
                                    placeholder="Country Of Manufacture">
                                    <option value="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add New Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
