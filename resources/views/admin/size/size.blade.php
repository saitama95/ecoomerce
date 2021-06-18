@extends('admin.layout')
@section('title')
     Size
@endsection
@section('size_select')
    active
@endsection
@section('content')
<h3>Coupans</h3>
<a href="{{route('manage_size')}}" class="btn btn-success mb-10">Add Size</a>
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
                            <th>Size</th>
                            <th>Status</th> 
                            <th>Edit</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sizes as $size)
                        <tr>
                            <td>{{$size->id}}</td>
                            <td>{{$size->size}}</td>
                            <td>
                                @if ($size->status === 1)
                                <a href="{{url('admin/size/status/0')}}/{{$size->id}}" class="btn btn-primary">Active</a>
                                @else
                                <a href="{{url('admin/size/status/1')}}/{{$size->id}}" class="btn btn-warning">DeActive</a>
                                @endif
                                
                            </td>
                            <td><a href="{{route('size.delete',$size->id)}}" class="btn btn-danger">Delete</a></td>
                            <td><a href="{{route('size.edit',$size->id)}}" class="btn btn-success">Edit</a></td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
@endsection