@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12 col-lg-12">
             <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                   <div class="iq-header-title">
                      <h4 class="card-title">Add New Spare Part</h4>
                   </div>
                </div>
                <div class="iq-card-body">
                   <form id="form-wizard1" class="text-center mt-4" method="POST" action="{{ route('dashboard.vendor-spare-parts.store') }}" enctype="multipart/form-data">
                        @csrf
                      <ul id="top-tab-list" class="p-0">
                         <li class="active" id="account">
                            <a href="javascript:void();">
                            <i class="ri-information-line"></i><span>Information</span>
                            {{-- name price status quantity --}}
                            </a>
                         </li>
                         <li id="personal">
                            <a href="javascript:void();">
                            <i class="ri-file-list-line"></i><span>Details</span>
                            {{-- description production_date expiration_date --}}
                            </a>
                         </li>
                         <li id="personal">
                            <a href="javascript:void();">
                            <i class="ri-roadster-line"></i><span>About Car</span>
                            {{-- brand_id model_id --}}
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
                                  <h3 class="mb-4">Spare Part Information:</h3>
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
                                     <label><b>Spare Part Name: *</b></label>
                                     <input type="input" class="form-control" name="name" placeholder="Your Spare Part" />
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label><b>Quantity:</b> </label>
                                     <input type="number" class="form-control" name="quantity" placeholder="quantity" />
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label><b>Status: *</b></label>
                                        <select class="custom-select" name="status" placeholder="Select Status">
                                            <option value="NEW">New</option>
                                            <option value="USED">Used</option>
                                            <option value="IMPORTATION">Imortation</option>
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
                         <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button>
                      </fieldset>
                      <fieldset>
                         <div class="form-card text-left">
                            <div class="row">
                               <div class="col-7">
                                  <h3 class="mb-4">Spare Part Details:</h3>
                            {{-- description production_date expiration_date --}}

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
                                    <label for="fname"><b>Production Date:</b></label>
                                   <input type="date" name="production_date" class="form-control" />
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="fname"><b>Expiration Date:</b></label>
                                   <input type="date" name="expiration_date" class="form-control" />
                                  </div>
                               </div>
                               <div class="col-md-6">
                                  <div class="form-group">
                                     <label><b>Description: *</b></label>
                                     <input type="text" class="form-control" name="description" placeholder="Descripe Your Part." />
                                  </div>
                               </div>
                            </div>
                         </div>
                         <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button>
                         <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
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
                        <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button>
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
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
                            <div class="form-group">
                                <label><b>Upload Your Videos:</b></label>
                                <input type="file" class="form-control" name="videos[]" accept="video/*" multiple>
                            </div>
                         </div>
                         <button type="submit" class="btn btn-primary next action-button float-right" value="Submit" >Submit</button>
                         <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                      </fieldset>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>
@endsection
