{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Duties Assigned 
                </h3>
            </div>
        </div>
        <div class="card-body">
        <table class="table table-bordered table-hover" id="kt_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Assignee</th>
                    <th>Duty Post</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Actions</th>

                </tr>
                </thead>
                <tbody>
                @if($assignDuties->count() > 0)
                @foreach($assignDuties as $index => $assignDuty)
                <tr>
                    <td>{{$index +=1}}</td>
                    <td>{{$assignDuty->user()->first()->first_name}} {{$assignDuty->user()->first()->last_name}}</td>
                    <td>{{$assignDuty->duty()->first()->name}}</td>
                    <td>{{ date("d, M, Y", strtotime($assignDuty->created_at))}}</td>
                    @if($assignDuty->status === 0)
                    <td class="datatable-ct">
                        <a class="btn btn-success" href="{{route('edit.user', $assignDuty->id)}}" ><i class=""></i>Pending</a>
                    </td>
                    @elseif($assignDuty->status === 1)
                    <td class="datatable-ct">
                        <a class="btn btn-success" href="{{route('edit.user', $assignDuty->id)}}" ><i class=""></i>Accepted</a>
                    </td>
                    @elseif($assignDuty->status === 2)
                    <td class="datatable-ct">
                        td<a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteClientModal{{ $assignDuty->id }}"><i class="  "></i>Declined</a>
                    </td>
                    @endif
                    <td class="datatable-ct">
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteClientModal{{ $assignDuty->id }}"><i class="  "></i>Close</a>
                    </td>
                </tr>
                @endforeach
               @endif
                </tbody>
            </table>

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
@endsection
