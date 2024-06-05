@extends('layouts.dashboard')
@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <form action="{{ route('dashboard.car-tunings.update',$carTuning->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input value="{{ $carTuning->name }}" name="name" type="input" class="form-control" id="email1">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Description:</label>
                            <textarea name="description"  class="form-control" type='text' id="pwd">{{ $carTuning->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
