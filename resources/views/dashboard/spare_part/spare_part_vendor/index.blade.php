@extends('layouts.dashboard')
@section('content')
<style>
    .carousel-item img {
        width: 100%;
        height: 300px; 
        object-fit: cover;
    }
</style>
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Spare Part List</h4>
                      </div>
                   </div>
                   <x-dashboard.alert />
                   <div class="iq-card-body">
                      <div class="table-responsive">
                        <a class="btn btn-primary" style="margin-bottom: 15px" href="{{ route('dashboard.vendor-spare-parts.create') }}">Add New Spare-part</a>

                        <div class="d-flex w-100">
                            <form class="mr-3 position-relative d-flex flex-grow-1" action="{{ URL::current() }}" method="get">
                                <div class="form-group mr-4 mb-0 flex-grow-1" style="max-width: fit-content;">
                                    <input type="input" name="name" class="form-control" id="exampleInputSearch" placeholder="Spare Part Name" aria-controls="user-list-table">
                                </div>
                                <div class="form-group mr-4 mb-0 flex-grow-1">
                                    <select name="brand_id" id="country" class="form-control" placeholder="Brand Of Car">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mr-4 mb-0" >
                                    <select class="form-control" name="status" placeholder="Status" id="exampleFormControlSelect1" style="width:150px">
                                        <option selected="" value="">All</option>
                                        <option value="NEW" @selected(request('status')=='NEW')>NEW</option>
                                        <option value="USED" @selected(request('status')=='USED')>USED</option>
                                        <option value="IMPORTATION" @selected(request('status')=='IMPORTATION')>IMPORTATION</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-dark">Search</button>
                            </form>
                        </div>

                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th></th>
                                  <th>Spare Part</th>
                                  <th>Status</th>
                                  <th>Quantity</th>
                                  <th>Production Date</th>
                                  <th>Expiration Date</th>
                                  <th>Price</th>
                                  <th>Sold Out</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach ($spare_parts as $spare_part)
                                <tr>
                                    @php
                                        $images = json_decode($spare_part->images, true); // Decode JSON into an associative array
                                    @endphp
                                    @if (!empty($images))
                                        {{-- Display the first image --}}
                                        <td class="text-center">
                                            <img class="rounded img-fluid avatar-40" src="{{ asset('storage/'.$images[0]) }}" alt="profile">
                                        </td>
                                    @else
                                        {{-- Display placeholder if no images --}}
                                        <td class="text-center"></td>
                                    @endif
                                    <td>
                                        <div class="iq-card-body">
                                            <button type="button" class="btn btn-link mb-3" data-toggle="modal" data-target="#exampleModalCenteredScrollable_{{ $spare_part->id }}">
                                                <b>{{ $spare_part->name }}</b>
                                            </button>
                                            <div id="exampleModalCenteredScrollable_{{ $spare_part->id }}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalCenteredScrollableTitle">{{ $spare_part->name }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="iq-card">
                                                                <div class="iq-card-header d-flex justify-content-between">
                                                                    <div class="iq-header-title">
                                                                        <h4 class="card-title">{{ $spare_part->name }}</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="iq-card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home_{{ $spare_part->id }}" role="tab" aria-controls="v-pills-home" aria-selected="true">Details</a>
                                                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile_{{ $spare_part->id }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">Description</a>
                                                                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages_{{ $spare_part->id }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">For Car</a>
                                                                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings_{{ $spare_part->id }}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Images</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-9">
                                                                            <div class="tab-content mt-0" id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active" id="v-pills-home_{{ $spare_part->id }}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                                                    <div><b>Status:</b>{{ $spare_part->status }}</div>
                                                                                    <div><b>Quantity:</b>{{ $spare_part->quantity }}</div>
                                                                                    <div><b>Price:</b>{{ $spare_part->price }}</div>
                                                                                    <div><b>Production Date:</b>{{ $spare_part->production_date }}</div>
                                                                                    <div><b>Expiration Date:</b>{{ $spare_part->expiration_date }}</div>
                                                                                </div>
                                                                                <div class="tab-pane fade" id="v-pills-profile_{{ $spare_part->id }}" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                                                    <p>{{ $spare_part->description }}</p>
                                                                                </div>
                                                                                <div class="tab-pane fade" id="v-pills-messages_{{ $spare_part->id }}" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                                                                    <div><b>This Spare Part Belongs To Brand : </b>{{ $spare_part->brand->name }}</div>
                                                                                    @php
                                                                                        $models = $spare_part->models;
                                                                                    @endphp
                                                                                    <div><b>Models : </b></div>
                                                                                    @foreach ($models as $model)
                                                                                        <div>-{{ $model->code }}</div>
                                                                                    @endforeach
                                                                                </div>
                                                                                @php
                                                                                    $images = json_decode($spare_part->images, true);
                                                                                @endphp
                                                                                @if (!empty($images))
                                                                                    <div class="tab-pane fade" id="v-pills-settings_{{ $spare_part->id }}" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                                                        <div class="iq-card">
                                                                                            <div class="iq-card-body">
                                                                                                <div id="carouselExampleIndicators_{{ $spare_part->id }}" class="carousel slide" data-ride="carousel">
                                                                                                    <ol class="carousel-indicators">
                                                                                                        @foreach($images as $key => $image)
                                                                                                            <li data-target="#carouselExampleIndicators_{{ $spare_part->id }}" data-slide-to="{{ $key }}" @if($key === 0) class="active" @endif></li>
                                                                                                        @endforeach
                                                                                                    </ol>
                                                                                                    <div class="carousel-inner">
                                                                                                        @foreach($images as $key => $image)
                                                                                                            <div class="carousel-item @if($key === 0) active @endif">
                                                                                                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="{{ $image }}">
                                                                                                            </div>
                                                                                                        @endforeach
                                                                                                    </div>
                                                                                                    <a class="carousel-control-prev" href="#carouselExampleIndicators_{{ $spare_part->id }}" role="button" data-slide="prev">
                                                                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                                        <span class="sr-only">Previous</span>
                                                                                                    </a>
                                                                                                    <a class="carousel-control-next" href="#carouselExampleIndicators_{{ $spare_part->id }}" role="button" data-slide="next">
                                                                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                                        <span class="sr-only">Next</span>
                                                                                                    </a>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a class="btn btn-primary" href="{{ route('dashboard.vendor-spare-parts.edit', $spare_part->id) }}"><i class="ri-pencil-line"></i>EDIT</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td><b>{{ $spare_part->status }}</b></td>
                                    <td>{{ (!empty($spare_part->quantity))?$spare_part->quantity.'Item':'0 Item' }}</td>
                                    <td>{{ $spare_part->production_date }}</td>
                                    <td>{{ $spare_part->expiration_date }}</td>
                                    <td>{{ $spare_part->price }}EGP</td>
                                    <td>{{ $spare_part->sold_out }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('dashboard.vendor-spare-parts.edit',$spare_part->id) }}"><i class="ri-pencil-line"></i></a>
                                            <form method="POST" action="{{ route('dashboard.vendor-spare-parts.destroy',$spare_part->id) }}">
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
                         {{ $spare_parts->withQueryString()->links() }}
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
 <script>
    $('#exampleModalCenteredScrollable_{{ $spare_part->id }}').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var modal = $(this);
        // Make an AJAX request to fetch the content for this spare part
        $.ajax({
            url: '/path-to-your-ajax-endpoint',
            method: 'GET',
            data: { spare_part_id: {{ $spare_part->id }} },
            success: function(response) {
                modal.find('.modal-content').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
</script>

@endsection
