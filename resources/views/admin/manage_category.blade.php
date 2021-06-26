@extends('admin.layout')

@section('content')
    <h3>Manage Category</h3>
    <a href="{{url('admin/category')}}" class="btn btn-danger mb-10">Back</a>
    <div class="card">
        <div class="card-body">
            <form action="{{route('category.create')}}" method="post" novalidate="novalidate">
            @csrf()
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Category</label>
                    <input value="{{$name}}" name="name" type="text" class="form-control">
                    @error('name')
                        <span class="error_msg">{{$message}}</span>
                    @enderror
                </div>
                    <input value="{{$id}}" name="id" type="hidden">
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection