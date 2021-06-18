@extends('admin.layout')

@section('title')
    Edit Size
@endsection
@section('size_select')
    active
@endsection
@section('content')
    <h3>Update Size</h3>
    <a href="{{route('admin.size')}}" class="btn btn-danger mb-10">Back</a>
    <div class="card">
        <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session('success')}}
		</div>
        @endif
            <form action="{{route('size.update',$size->id)}}" method="post" novalidate="novalidate">
            @csrf()
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Size</label>
                    <input id="category" name="size" type="text" class="form-control" value="{{$size->size}}">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="error_msg">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Update Size
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection