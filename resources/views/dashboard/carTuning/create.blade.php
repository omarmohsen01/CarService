@extends('layouts.dashboard')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <form action="{{ route('dashboard.car-tunings.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input name="name" type="input" class="form-control" id="email1">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Description:</label>
                            <textarea name="description" type="text" class="form-control" id="pwd"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
