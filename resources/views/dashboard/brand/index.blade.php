@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Brand List</h4>
                      </div>
                   </div>
                   <x-dashboard.alert />
                   <div class="iq-card-body">
                      <div class="table-responsive">
                        <a class="btn btn-primary" style="margin-bottom: 15px" href="{{ route('dashboard.brands.create') }}">Add New Brand</a>

                         <div class="row justify-content-between">
                            <div class="col-sm-12 col-md-6">
                               <div id="user_list_datatable_info" class="dataTables_filter">
                                <form class="mr-3 position-relative d-flex" action="{{ URL::current() }}" method="get">
                                    <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <input type="input" name="name" class="form-control" id="exampleInputSearch" placeholder="Brand Name" aria-controls="user-list-table">
                                    </div>
                                    <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <select name="country_of_manufacture" id="country" class="form-control" placeholder="Country Of Manufacture">
                                            <option value="">Select Country</option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Search</button>
                                </form>

                               </div>
                            </div>
                         </div>
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th></th>
                                  <th>Brand Name</th>
                                  <th>Country Of Manufacture</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td class="text-center"><img class="rounded img-fluid avatar-40" src="{{ asset('storage/'.$brand->image) }}" alt="profile"></td>
                                    <td><b>{{ strtoupper($brand->name) }}</b></td>
                                    <td>{{ $brand->country_of_manufacture }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('dashboard.brands.edit',$brand->id) }}"><i class="ri-pencil-line"></i></a>
                                            <form method="POST" action="{{ route('dashboard.brands.destroy',$brand->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                           </tbody>
                         </table>
                      </div>
                         {{-- <div class="row justify-content-between mt-3">
                            <div id="user-list-page-info" class="col-md-6">
                               <span>Showing 1 to 5 of 5 entries</span>
                            </div>
                            <div class="col-md-6">
                               <nav aria-label="Page navigation example">
                                  <ul class="pagination justify-content-end mb-0">
                                     <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                     </li>
                                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                                     <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                     </li>
                                  </ul>
                               </nav>
                            </div>
                         </div> --}}
                         {{ $brands->withQueryString()->links() }}
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
