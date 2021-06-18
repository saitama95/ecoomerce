@extends('admin.layout')

@section('title')
    Edit coupan
@endsection
@section('content')
    <h3>Update Coupan</h3>
    <a href="{{route('admin.coupan')}}" class="btn btn-danger mb-10">Back</a>
    <div class="card">
        <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session('success')}}
		</div>
        @endif
            <form action="{{route('coupan.update',$coupan->id)}}" method="post" novalidate="novalidate">
            @csrf()
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Name</label>
                    <input id="category" name="name" type="text" class="form-control" value="{{$coupan->title}}">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="error_msg">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Code</label>
                    <input id="category" name="code" type="text" class="form-control" value="{{$coupan->code}}">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="error_msg">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Value</label>
                    <input id="category" name="value" type="text" class="form-control" value="{{$coupan->code}}">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="error_msg">{{$error}}</span>
                        @endforeach
                    @endif
                </div>
               
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Update coupan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection