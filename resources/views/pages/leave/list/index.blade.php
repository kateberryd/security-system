{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Leave Requests
                </h3>
            </div>
        </div>

        <div class="card-body">

        <table class="table table-bordered table-hover" id="kt_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Title</th>
                    <th>Duration</th>
                    <th>Description</th>
                    <th>Status</th>

                </tr>
                </thead>
                <tbody>
                @if($leaveRequests->count() > 0)
                @foreach($leaveRequests as $index => $leaveRequest)
                <tr>
                    <td>{{$index +=1}}</td>
                    <td>{{$leaveRequest->user()->first()->first_name}}</td>
                    <td>{{$leaveRequest->user()->first()->last_name}}</td>
                    <td>{{$leaveRequest->title}}</td>
                    <td>{{$leaveRequest->duration}}</td>
                    <td>{{$leaveRequest->description}}</td>
                    @if($leaveRequest->status == 1)
                    <td class="datatable-ct">
                        <a class="btn btn-success" href="javascript:acceptRequest({{$leaveRequest->id}})" ><i class="disabled"></i>Approved</a>
                    </td>
                    
                    @elseif($leaveRequest->status == 2)
                    <td class="datatable-ct">
                        <a href="javascript:declineRequest({{$leaveRequest->id}})" class="btn btn-danger"><i class="  "></i>Declined</a>
                    </td>
                    
                    @elseif($leaveRequest->status == 0)
                    <td class="datatable-ct">
                        <a class="btn btn-success" href="javascript:acceptRequest({{$leaveRequest->id}})" ><i class=""></i>Approve</a>
                        <a href="javascript:declineRequest({{$leaveRequest->id}})" class="btn btn-danger ml-4"><i class="  "></i>Decline</a>

                    </td>
                    
                    
                    @endif
                    <!-- <td class="datatable-ct">
                        <a class="btn btn-primary" href="{{route('edit.user', $leaveRequest->id)}}" ><i class=""></i>Close Request</a>
                    </td> -->
                 
                    
                </tr>
                @endforeach
               @endif
                </tbody>
            </table>

        </div>
        <input type="hidden" id="path_site" value="{{url('/')}}" />
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
@endsection
