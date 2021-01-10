{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Add Duty Post
                </h3>
            </div>
        </div>
        <div class="card-body">
        <form action="{{route('store.post')}}" method="POST">
        @csrf
        <div class="form-group row">
            <div class=" col-lg-4 col-md-9 col-sm-12">
            <label class="mb-2">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name">
              <small class="text-danger">{{$errors->first('name')}}</small>

            </div>
        </div>
        <div class="form-group row">
            <div class=" col-lg-4 col-md-9 col-sm-12">
            <label class="mb-2">Location</label>
              <input type="text" class="form-control" name="location" placeholder="Location">
              <small class="text-danger">{{$errors->first('location')}}</small>
            </div>
        </div>
    
        <div class="form-group row">
            <div class="col-12">
                <button href="#" class="btn btn-primary font-weight-bolder">Submit</button>
            </div>
            </div>
        </form>
        </div>

    </div>

@endsection

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/pages/crud/datatables/basic/basic.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        $(document).ready(function() {
            $('.select').select();
        });
    </script>
@endsection
