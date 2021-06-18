@extends('admin.layout')
@section('title')
     Product
@endsection
@section('product_select')
    active
@endsection
@section('content')
<h3>Product</h3>
<a href="{{route('manage_product')}}" class="btn btn-success mb-10">Add Product</a>
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
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td><img src="{{asset('storage/uploads/post/'.$product->image)}}" width="100px"></td>
                            <td>
                                @if ($product->status === 1)
                                <a href="{{url('admin/product/status/0')}}/{{$product->id}}" class="btn btn-primary">Active</a>
                                @else
                                <a href="{{url('admin/product/status/1')}}/{{$product->id}}" class="btn btn-warning">DeActive</a>
                                @endif
                                
                            </td>
                            <td><a href="{{route('product.delete',$product->id)}}" class="btn btn-danger">Delete</a></td>
                            <td><a href="{{route('product.edit',$product->id)}}" class="btn btn-success">Edit</a></td>
                        </tr>
                    @endforeach
                        
                    </tbody>
                </table>
            </div>
@endsection