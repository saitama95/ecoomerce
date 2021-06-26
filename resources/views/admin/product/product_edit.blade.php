@extends('admin.layout')

@section('title')
    Edit Product
@endsection
@section('content')
<h3>Edit Product</h3>
<a href="{{route('admin.product')}}" class="btn btn-danger mb-10">Back</a>
<form action="{{route('product.update',$product->id)}}" method="post" novalidate="novalidate"  method="post" enctype="multipart/form-data">
    <div class="card">
        <div class="card-body">
            @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session('success')}}
            </div>
            @endif
                @csrf()
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Name</label>
                    <input id="category" name="name" type="text" class="form-control" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1">Brand</label>
                            <input id="category" name="brand" type="text" class="form-control" value="{{$product->brand}}">
                        </div>
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1">Model</label>
                            <input id="category" name="model" type="text" class="form-control" value="{{$product->model}}">
                        </div>
                        <div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1">Category</label>
                            <select name="category_id" class="form-control" id="">
                                <option @if ($product->category_id) selected @endif value="{{$product->category_id}}">
                                {{$product->category->name}}
                                </option>
                                @foreach ($categorys  as $category)
                                    @if ($category->id!==$product->category_id)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach   
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1">Short Desc</label>
                            <textarea name="short_desc" id="" cols="3" rows="3" class="form-control">{{$product->short_desc}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1">Desc</label>
                            <textarea name="desc" id="" cols="3" rows="3"  class="form-control">{{$product->desc}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1">keywords</label>
                            <textarea name="keywords" id=""  cols="3" rows="3"  class="form-control">{{$product->keywords}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1">Technical Specification</label>
                            <textarea name="technical_specification" id=""  cols="3" rows="3" class="form-control">{{$product->technical_specification}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1">Uses</label>
                            <textarea name="uses" id=""  cols="3" rows="3"  class="form-control">{{$product->uses}}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="cc-payment" class="control-label mb-1">Warranty</label>
                            <textarea name="warranty" id=""  cols="3" rows="3"  class="form-control">{{$product->warranty}}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Image</label>
                    <input require name="image" type="file" class="form-control">
                </div>
                @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error_msg">{{$error}}</div>
                        @endforeach
                @endif     
        </div>
    </div>

    @foreach ($results as $key=>$value)
    <?php
        $parr = (array)$value
    ?>
    <div class="card" id="product_attri_box">
        <div class="card-body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="cc-payment" class="control-label mb-1">SKU</label>
                        <input id="category" name="sku[]" type="text" value="{{$parr['sku']}}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="cc-payment" class="control-label mb-1">MRP</label>
                        <input id="category" name="mrp[]" type="text" class="form-control" value="{{$parr['mrp']}}">
                    </div>
                    <div class="col-md-3">
                        <label for="cc-payment" class="control-label mb-1">Price</label>
                        <input id="category" name="price[]" type="text" class="form-control" value="{{$parr['price']}}">
                    </div>
                    <div class="col-md-3">
                        <label for="cc-payment" class="control-label mb-1">Quantity</label>
                        <input id="category" name="qty[]" type="text" class="form-control" value="{{$parr['qty']}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1">Size</label>
                        <select name="size_id[]" class="form-control" id="size_id">
                        <option @if ($product->category_id) selected @endif value="{{$product->category_id}}">
                                {{$product->category->name}}
                        </option>
                            @foreach ($sizes  as $size)
                            <option value="{{$size->id}}">{{$size->size}}</option>
                            @endforeach   
                        </select>
                    </div>
                
                    <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1">Color</label>
                        <select name="color_id[]" class="form-control" id="color_id">
                            <option value="0"  selected>Select</option>
                            @foreach ($colors  as $color)
                            <option value="{{$color->id}}">{{$color->color}}</option>
                            @endforeach   
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1">Image</label>
                        <input require name="attr_image[]" type="file" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="cc-payment" class="control-label mb-1"></label>
                        <br>
                        <a class="btn btn-success" onclick="addMore()"style="margin-top:7px;">Add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    
    <div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
            Create Product
        </button>
    </div>    
</form>
<script>
    var loop_count=1;
    function addMore(){
        loop_count++;
        var html = ` <div class="card" id="product_attri_box`+loop_count+`">
                    <div class="card-body">
                    <div class="form-group">
                    <div class="row">`;

             html+= `<div class="col-md-3">
                            <label for="cc-payment" class="control-label mb-1">SKU</label>
                            <input id="category" name="sku[]" type="text" class="form-control">
                        </div>`;
              html+= `<div class="col-md-3">
                            <label for="cc-payment" class="control-label mb-1">MRP</label>
                            <input id="category" name="mrp[]" type="text" class="form-control">
                        </div>`;
             html+= `<div class="col-md-3">
                            <label for="cc-payment" class="control-label mb-1">Price</label>
                            <input id="category" name="price[]" type="text" class="form-control">
                        </div>`;
            html+= `<div class="col-md-3">
                            <label for="cc-payment" class="control-label mb-1">Quantity</label>
                            <input id="category" name="qty[]" type="text" class="form-control">
                        </div>`;
                        var size_id_html = jQuery('#size_id').html();
            html+= `<div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1">Size</label>
                            <select name="size_id[]" class="form-control" id="size_id">
                               `+size_id_html+`
                            </select>
                        </div>`;
                        var color_id_html = jQuery('#color_id').html();
            html+= `<div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1">Color</label>
                            <select name="color_id[]" class="form-control" id="color_id">
                               `+color_id_html+`
                            </select>
                        </div>`;

             html+= `<div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1">Image</label>
                            <input require name="attr_image[]" type="file" class="form-control">
                        </div>`;
            html+=`<div class="col-md-4">
                            <label for="cc-payment" class="control-label mb-1"></label>
                           <br>
                            <a class="btn btn-danger" onclick="remove_box(`+loop_count+`)" style="margin-top:7px;"><i class="fas fa-minus-circle"></i></a>
                        </div>`;                                                  
            html+= `</div></div></div></div>`;
        jQuery('#product_attri_box').append(html); 

    }
    function remove_box(loop_count){
        jQuery('#product_attri_box'+loop_count).remove(); 
    }
</script>    
@endsection
