{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Assign Duty Post
                </h3>
            </div>
        </div>
        <div class="card-body">
        <form action="{{route('store.assign-duty')}}" method="POST">
        @csrf
          
       <div class="col-md-5">
       <div class="form-group row">
            <label class="mb-3">User </label>
            <select class="form-control kt-select2 select2" id="kt_select2_1" name="user_id">
            <option value="" selected disabled>Select...</option>
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
            @endforeach                    
        </select>
        </div>
         
        <div class="form-group row">
                <label class="mb-3">Duty Post </label>
                <select class="form-control kt-select2 select" id="kt_select2_1" name="duty_id">
                @foreach($duties as $duty)
                    <option value="{{$duty->id}}">{{$duty->name}}</option>
                @endforeach                    
            </select>
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
            $('.select').select();
        });
   
    </script>
@endsection
