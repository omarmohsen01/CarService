@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Orders List</h4>
                      </div>
                   </div>
                   <x-dashboard.alert />
                   <div class="iq-card-body">
                      <div class="table-responsive">
                        {{-- <a class="btn btn-primary" style="margin-bottom: 15px" href="{{ route('dashboard.admins.create') }}">Add New Admin Or Vendor</a> --}}

                         <div class="row justify-content-between">
                            {{-- <div class="col-sm-12 col-md-6">
                               <div id="user_list_datatable_info" class="dataTables_filter">
                                <form class="mr-3 position-relative d-flex" action="{{ URL::current() }}" method="get">
                                    <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <input type="input" name="first_name" class="form-control" id="exampleInputSearch" placeholder="First Name" aria-controls="user-list-table">
                                    </div>
                                    <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <input type="email" name="email" class="form-control" id="exampleInputSearch" placeholder="Email" aria-controls="user-list-table">
                                    </div>
                                    <div class="form-group mr-4 mb-0 flex-grow-1">
                                        <input type="number" name="phone" class="form-control" id="exampleInputSearch" placeholder="Phone Number" aria-controls="user-list-table">
                                    </div>
                                    <div class="form-group mr-4 mb-0" >
                                        <select class="form-control" name="status" placeholder="Status" id="exampleFormControlSelect1" style="width:150px">
                                            <option selected="" value="">All</option>
                                            <option value="ACTIVE" @selected(request('status')=='ACTIVE')>ACTIVE</option>
                                            <option value="INACTIVE" @selected(request('status')=='INACTIVE')>INACTIVE</option>
                                        </select>
                                    </div>
                                    <div class="form-group mr-4 mb-0" >
                                        <select class="form-control" name="type" placeholder="type" id="exampleFormControlSelect1" style="width:150px">
                                            <option selected="" value="">All</option>
                                            <option value="ADMIN" @selected(request('type')=='ADMIN')>ADMIN</option>
                                            <option value="VENDOR" @selected(request('type')=='VENDOR')>VENDOR</option>
                                            <option value="SUPER_ADMIN" @selected(request('type')=='SUPER_ADMIN')>SUPERADMIN</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-dark">Search</button>
                                </form>

                               </div>
                            </div> --}}
                            {{-- <div class="col-sm-12 col-md-6">
                               <div class="user-list-files d-flex float-right">
                                  <a class="iq-bg-primary" href="javascript:void();" >
                                     Print
                                   </a>
                                  <a class="iq-bg-primary" href="javascript:void();">
                                     Excel
                                   </a>
                                   <a class="iq-bg-primary" href="javascript:void();">
                                     Pdf
                                   </a>
                                 </div>
                            </div> --}}
                         </div>
                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th>id</th>
                                  <th>Order Number</th>
                                  <th>Customer Name</th>
                                  <th>Contact</th>
                                  <th>Total Price</th>
                                  <th>Status</th>
                                  <th>Date</th>
                                  {{-- <th>Action</th> --}}
                               </tr>
                           </thead>
                           <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_number }}</td>
                                    <td>{{ $order->customer_name }}</td>
                                    <td>{{ $order->customer_phone }}</td>
                                    <td>${{ $order->product_total_price }}</td>
                                    <td><span class="badge iq-bg-primary">{{ $order->status }}</span></td>
                                    <td>{{ $order->created_at }}</td>
                                    {{-- <td>{{ $order->type }}</td> --}}
                                    {{-- <td>
                                        <div class="flex align-items-center list-user-action">
                                            @if ($order->status == 'PENDING')
                                                <form method="POST" action="{{ route('dashboard.orders.changeStatus',$order->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Active"><i class="ri-user-follow-line"></i></button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('dashboard.orders.changeStatus',$order->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Inactive"><i class="ri-user-unfollow-line"></i></button>
                                                </form>
                                            @endif

                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('dashboard.orders.edit',$order->id) }}"><i class="ri-pencil-line"></i></a>
                                            <form method="POST" action="{{ route('dashboard.orders.destroy',$order->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="ri-delete-bin-line"></i></button>
                                            </form>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                           </tbody>
                         </table>
                      </div>
                         {{-- {{ $orders->withQueryString()->links() }} --}}
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
