@extends('admin.layout')

@section('title')
    Add color
@endsection
@section('content')
    <h3>Add Color</h3>
    <a href="{{route('admin.color')}}" class="btn btn-danger mb-10">Back</a>
    <div class="card">
        <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session('success')}}
		</div>
        @endif
            <form action="{{route('color.create')}}" method="post" novalidate="novalidate">
            @csrf()
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Color</label>
                    <input id="category" name="color" type="text" class="form-control">
                </div>
                @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error_msg">{{$error}}</div>
                        @endforeach
                @endif
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Create Color
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection