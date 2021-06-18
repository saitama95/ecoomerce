@extends('admin.layout')
@section('title')
     Coupan
@endsection
@section('coupan_select')
    active
@endsection
@section('content')
<h3>Coupans</h3>
<a href="{{route('manage_coupan')}}" class="btn btn-success mb-10">Add Coupan</a>
  <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
        @if (Session::has('danger'))
            <div class="alert alert-danger" role="alert">
            {{Session('danger')}}
		    </div>
        @endif
        @if (Session::has('update'))
            <div class="alert alert-success" role="alert">
            {{Session('update')}}
		    </div>
        @endif
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Name</th>
                            <th>Value</th> 
                            <th>Code</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($coupans as $coupan)
                        <tr>
                            <td>{{$coupan->id}}</td>
                            <td>{{$coupan->name}}</td>
                            <td>{{$coupan->value}}</td>
                            <td>{{$coupan->code}}</td>
                            <td>
                                @if ($coupan->status === 1)
                                <a href="{{url('admin/coupan/status/0')}}/{{$coupan->id}}" class="btn btn-primary">Active</a>
                                @else
                                <a href="{{url('admin/coupan/status/1')}}/{{$coupan->id}}" class="btn btn-warning">DeActive</a>
                                @endif
                                
                            </td>
                            <td><a href="{{route('coupan.delete',$coupan->id)}}" class="btn btn-danger">Delete</a></td>
                            <td><a href="{{route('coupan.edit',$coupan->id)}}" class="btn btn-success">Edit</a></td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
@endsection