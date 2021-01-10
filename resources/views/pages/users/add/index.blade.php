{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Add User
                    
                </h3>
            </div>
        </div>

        <div class="card-body">
        <form action="{{route('store.user')}}" method="POST">
         @csrf
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">First Name</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input type="text" class="form-control" name="first_name" placeholder="First Name">
              <small class="text-danger">{{$errors->first('first_name')}}</small>

            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Last Name</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input type="text" class="form-control" name="last_name" placeholder="Last Name">
              <small class="text-danger">{{$errors->first('last_name')}}</small>

            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-1
            2">Email Address</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input type="email" class="form-control" name="email" placeholder="Email Address">
              <small class="text-danger">{{$errors->first('email')}}</small>

            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Phone Number</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input type="text" class="form-control" name="phone_number" placeholder="Phone Number">
              <small class="text-danger">{{$errors->first('phone_number')}}</small>

            </div>
        </div>
            
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Country</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
                <select class="form-control kt-select2 select"  id="kt_select2_1" name="country">
                    <option value="AK">Alaska</option>
                </select>
                <small class="text-danger">{{$errors->first('country')}}</small>

            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">State</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
                <select class="form-control kt-select2 select2" id="kt_select2_1" name="state">
                    <option value="AK">Alaska</option>
                    <option value="HI">Hawaii</option>
                    <option value="CA">California</option>
                
                </select>
                <small class="text-danger">{{$errors->first('state')}}</small>

            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12">Address</label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
              <input type="address" class="form-control" name="address" placeholder=" Address">
              <small class="text-danger">{{$errors->first('address')}}</small>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-form-label col-lg-3 col-sm-12"></label>
            <div class=" col-lg-4 col-md-9 col-sm-12">
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
