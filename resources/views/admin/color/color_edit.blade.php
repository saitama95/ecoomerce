@extends('admin.layout')

@section('title')
    Edit Color
@endsection
@section('content')
    <h3>Update Coupan</h3>
    <a href="{{route('admin.color')}}" class="btn btn-danger mb-10">Back</a>
    <div class="card">
        <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session('success')}}
		</div>
        @endif
            <form action="{{route('color.update',$color->id)}}" method="post" novalidate="novalidate">
            @csrf()
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Name</label>
                    <input id="category" name="color" type="text" class="form-control" value="{{$color->color}}">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="error_msg">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
               
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Update Color
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection