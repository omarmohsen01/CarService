@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Car Tuning List</h4>
                      </div>
                   </div>
                   <x-dashboard.alert />
                   <div class="iq-card-body">
                      <div class="table-responsive">
                        <a class="btn btn-primary" style="margin-bottom: 15px" href="{{ route('dashboard.car-tunings.create') }}">Add New Car Tuning</a>

                         <table id="user-list-table" class="table table-striped table-bordered mt-4" role="grid" aria-describedby="user-list-page-info">
                           <thead>
                               <tr>
                                  <th></th>
                                  <th>Car Tuning Name</th>
                                  <th>Descripion</th>
                                  <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                            @foreach ($carTunings as $carTuning)
                                <tr>
                                    <td></td>
                                    <td><b>{{ strtoupper($carTuning->name) }}</b></td>
                                    <td>{{ $carTuning->description }}</td>
                                    <td>
                                        <div class="flex align-items-center list-user-action">
                                            <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('dashboard.car-tunings.edit',$carTuning->id) }}"><i class="ri-pencil-line"></i></a>
                                            <form method="POST" action="{{ route('dashboard.car-tunings.destroy',$carTuning->id) }}">
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
                         {{ $carTunings->withQueryString()->links() }}
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>
@endsection
