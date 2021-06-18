@extends('admin.layout')

@section('title')
    Add Product
@endsection
@section('content')
    <h3>Add Product</h3>
    <a href="{{route('admin.product')}}" class="btn btn-danger mb-10">Back</a>
    <div class="card">
        <div class="card-body">
        @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session('success')}}
		</div>
        @endif
            <form action="{{route('product.create')}}" method="post" novalidate="novalidate"  method="post" enctype="multipart/form-data">
            @csrf()
            <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Name</label>
                    <input id="category" name="name" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Brand</label>
                    <input id="category" name="brand" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Model</label>
                    <input id="category" name="model" type="text" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Category</label>
                    <select name="category_id" class="form-control" id="">
                        <option selected disabled>Select</option>
                        @foreach ($categorys  as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach   
                    </select>
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Short Desc</label>
                    <textarea name="short_desc" id="" cols="3" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Image</label>
                    <input require name="image" type="file" class="form-control">
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Desc</label>
                    <textarea name="desc" id="" cols="3" rows="3"  class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">keywords</label>
                    <textarea name="keywords" id=""  cols="3" rows="3"  class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Technical Specification</label>
                    <textarea name="technical_specification" id=""  cols="3" rows="3" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Uses</label>
                    <textarea name="uses" id=""  cols="3" rows="3"  class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Warranty</label>
                    <textarea name="warranty" id=""  cols="3" rows="3"  class="form-control"></textarea>
                </div>
            
                @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error_msg">{{$error}}</div>
                        @endforeach
                @endif
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        Create Product
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection