{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">All Duty Posts
                </h3>
            </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover" id="kt_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @if($dutyposts->count() > 0)
                @foreach($dutyposts as $index => $post)
                <tr>
                    <td>{{$index +=1}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->location}}</td>
                    <td class="datatable-ct">
                        <a class="btn btn-primary" href="{{route('edit.post', $post->id)}}" ><i class="fa fa-edit"></i>Edit</a>
                    </td>
                    <td class="datatable-ct">
                        <a href="" class="btn btn-danger" data-toggle="modal" data-target="#deleteClientModal{{ $post->id }}"><i class="fa fa-trash  "></i>delete</a>
                    </td>
                </tr>
                @endforeach
               @endif
                </tbody>
            </table>

        </div>

    </div>
    
    @foreach($dutyposts as $modal)
     
     <!-- ///////////////////////////////////////// -->
 
     <div class="modal fade bs-example-modal-lg" id="deleteClientModal{{ $modal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
       <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title" id="exampleModalLabel1">Warning</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <form class="form p-t-20" method="post" action="{{ route('delete.post', $modal->id)}}" >
             <div class="modal-body">
               {{ csrf_field() }}
               {{ method_field('GET') }}
               <input type="hidden" name="id" value="{{ $modal->id }}">          
 
               <div class="row">
                 <div class="col-md-12">
                   <p>Are you sure you want to delete this duty post?</p>
                 </div>
               </div>                                 
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-warning">Confirm Delete</button>
             </div>
           </form>
         </div>
       </div>
     </div>
   @endforeach

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
