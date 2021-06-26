@extends('admin.layout')

@section('category_select')
    active
@endsection
@section('content')
<h3>Category</h3>
<a href="{{route('manage_category')}}" class="btn btn-success mb-10">Add Category</a>
  <div class="row m-t-30">
        <div class="col-md-12">
            <!-- DATA TABLE-->
        @if (Session::has('danger'))
            <div class="alert alert-danger" role="alert">
            {{Session('danger')}}
		    </div>
        @endif
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{Session('message')}}
		</div>
        @endif
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>S.no</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                @if ($category->status === 1)
                                <a href="{{url('admin/category/status/0')}}/{{$category->id}}" class="btn btn-primary">Active</a>
                                @else
                                <a href="{{url('admin/category/status/1')}}/{{$category->id}}" class="btn btn-warning">DeActive</a>
                                @endif
                                
                            </td>
                            <td><a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delete</a></td>
                            <td><a href="{{url('admin/category/manage_category')}}/{{$category->id}}" class="btn btn-success">Edit</a></td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
@endsection