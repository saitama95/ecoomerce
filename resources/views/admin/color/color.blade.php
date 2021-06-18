@extends('admin.layout')
@section('title')
     Color
@endsection
@section('color_select')
    active
@endsection
@section('content')
<h3>Color</h3>
<a href="{{route('manage_color')}}" class="btn btn-success mb-10">Add Color</a>
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
        @if (Session::has('status'))
        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">Success</span>
            {{Session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        @endif
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Color</th>
                            <th>Status</th> 
                            <th>Edit</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($colors as $color)
                        <tr>
                            <td>{{$color->id}}</td>
                            <td>{{$color->color}}</td>
                            <td>
                                @if ($color->size === 1)
                                <a href="{{url('admin/color/status/0')}}/{{$color->id}}" class="btn btn-primary">Active</a>
                                @else
                                <a href="{{url('admin/color/status/1')}}/{{$color->id}}" class="btn btn-warning">DeActive</a>
                                @endif
                                
                            </td>
                            <td><a href="{{route('color.delete',$color->id)}}" class="btn btn-danger">Delete</a></td>
                            <td><a href="{{route('color.edit',$color->id)}}" class="btn btn-success">Edit</a></td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
@endsection