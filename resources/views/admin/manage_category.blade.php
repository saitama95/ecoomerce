@extends('admin.layout')

@section('content')
    <h3>Add Category</h3>
    <a href="{{route('admin.category')}}" class="btn btn-danger mb-10">Back</a>
    <div class="card">
        <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session('success')}}
		</div>
        @endif
            <form action="{{route('category.create')}}" method="post" novalidate="novalidate">
            @csrf()
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Category</label>
                    <input id="category" name="name" type="text" class="form-control">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="error_msg">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
               
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Create Category
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection