@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Add New Car Tuning Service</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form id="form-wizard1" class="text-center mt-4" method="POST" action="{{ route('dashboard.car-tuning-services.store') }}" enctype="multipart/form-data">
                        @csrf
                      <ul id="top-tab-list" class="p-0">
                         <li class="active" id="account">
                            <a href="javascript:void();">
                            <i class="ri-information-line"></i><span>Information</span>
                            </a>
                         </li>
                         <li id="personal">
                            <a href="javascript:void();">
                            <i class="ri-file-list-line"></i><span>Details</span>
                            </a>
                         </li>
                         <li id="personal">
                            <a href="javascript:void();">
                            <i class="ri-roadster-line"></i><span>About Car</span>
                            </a>
                         </li>
                         <li id="payment">
                            <a href="javascript:void();">
                            <i class="ri-camera-fill"></i><span>Image</span>
                            </a>
                         </li>
                      </ul>
                      <!-- fieldsets -->
                      <fieldset>
                         <div class="form-card text-left">
                            <div class="row">
                               <div class="col-7">
                                  <h3 class="mb-4">Car Tuning Information:</h3>
                               </div>
                               <div class="col-5">
                                  <h2 class="steps">Step 1 - 4</h2>
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
                            <div class="row">
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label><b>Car Tuning Service Name: *</b></label>
                                     <input type="input" class="form-control" name="name" placeholder="Your Car Tuning" />
                                  </div>
                               </div>
                               <div class="col-md-6">
                                <div class="form-group">
                                   <label><b>For Car Tuning: *</b></label>
                                      <select class="custom-select" name="car_tuning_id" placeholder="Select Car Tuning">
                                        @foreach ($car_tunings as $car_tuning)
                                                <option value="{{ $car_tuning->id }}">{{ $car_tuning->name }}</option>
                                        @endforeach
                                      </select>
                                </div>
                             </div>
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label><b>Installation: *</b></label>
                                        <select class="custom-select" name="installation" placeholder="Select Installation">
                                            <option value="YES">Yes</option>
                                            <option value="NO">No</option>
                                        </select>
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label><b>Price: *</b></label>
                                     <input type="number" class="form-control" name="price" placeholder="Price In EGP" />
                                  </div>
                               </div>
                            </div>
                         </div>
                         <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Next</button>
                      </fieldset>
                      <fieldset>
                         <div class="form-card text-left">
                            <div class="row">
                               <div class="col-7">
                                  <h3 class="mb-4">Car Tuning Details:</h3>
                               </div>
                               <div class="col-5">
                                  <h2 class="steps">Step 2 - 4</h2>
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
                            <div class="row">
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label><b>Description: *</b></label>
                                     <textarea class="form-control" name="description" >Describe Your Service</textarea>
                                  </div>
                               </div>
                            </div>
                         </div>
                         <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Next</button>
                         <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                      </fieldset>
                      <fieldset>
                        <div class="form-card text-left">
                           <div class="row">
                              <div class="col-7">
                                 <h3 class="mb-4">Which Brand You Target:</h3>
                              </div>
                              <div class="col-5">
                                 <h2 class="steps">Step 3 - 4</h2>
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
                            <livewire:show-models />
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next">Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                     </fieldset>
                      <fieldset>
                         <div class="form-card text-left">
                            <div class="row">
                               <div class="col-7">
                                  <h3 class="mb-4">Image Upload:</h3>
                               </div>
                               <div class="col-5">
                                  <h2 class="steps">Step 4 - 4</h2>
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
                            <div class="form-group">
                                <label><b>Upload Your Photos:</b></label>
                                <input type="file" class="form-control" name="images[]" multiple/>
                            </div>

                         </div>
                         <button type="submit" class="btn btn-primary next action-button float-right" value="Submit">Submit</button>
                         <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous">Previous</button>
                      </fieldset>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
@endsection
