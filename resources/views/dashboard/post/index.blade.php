@extends('layouts.dashboard')
@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid">
       <div class="row">
          <div class="col-sm-12">
                <div class="iq-card">
                   <div class="iq-card-header d-flex justify-content-between">
                      <div class="iq-header-title">
                         <h4 class="card-title">Posts List</h4>
                      </div>
                   </div>
                   <x-dashboard.alert />
                   <div class="iq-card-body">
                      <div class="table-responsive">
                        {{-- <a class="btn btn-primary" style="margin-bottom: 15px" href="{{ route('dashboard.models.create') }}">Add New Model</a> --}}

                        <div class="d-flex w-100">
                            <form class="mr-3 position-relative d-flex flex-grow-1" action="{{ URL::current() }}" method="get">
                                <div class="form-group mr-4 mb-0 flex-grow-1">
                                    <select name="brand_id" id="brand_select" class="form-control" placeholder="Brand Of Car">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mr-4 mb-0 flex-grow-1">
                                    <select class="custom-select" name="user_id" id="user_select" placeholder="Select User">
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-dark">Search</button>
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                               <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Content</th>
                                  <th scope="col">Brand</th>
                                  <th scope="col">Author</th>
                                  <th scope="col">Action</th>
                               </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <th scope="row">{{ $post->id }}</th>
                                        <td>{{ substr($post->content, 0, 100) }}{{ strlen($post->content) > 100 ? '...' : '' }}</td>
                                        <td>{{ $post->brand->name }}</td>
                                        <td>{{ $post->user->first_name }} {{ $post->user->last_name }}</td>
                                        <td>
                                            <div class="flex align-items-center list-user-action">
                                                {{-- <a class="iq-bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="{{ route('dashboard.users.edit',$user->id) }}"><i class="ri-pencil-line"></i></a> --}}
                                                <form method="POST" action="{{ route('dashboard.users.destroy',$user->id) }}">
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
                         {{ $posts->withQueryString()->links() }}
                   </div>
                </div>
          </div>
       </div>
    </div>
 </div>

 {{-- <script>
    // Filter brands
    $('#brand_select').on('input', function() {
        var input, filter, select, option, i;
        input = this;
        filter = input.value.toUpperCase();
        select = input.parentNode;
        options = select.getElementsByTagName('option');
        for (i = 0; i < options.length; i++) {
            option = options[i];
            if (option.innerText.toUpperCase().indexOf(filter) > -1) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        }
    });

    // Filter users
    $('#user_select').on('input', function() {
        var input, filter, select, option, i;
        input = this;
        filter = input.value.toUpperCase();
        select = input.parentNode;
        options = select.getElementsByTagName('option');
        for (i = 0; i < options.length; i++) {
            option = options[i];
            if (option.innerText.toUpperCase().indexOf(filter) > -1) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        }
    });
</script> --}}
@endsection
