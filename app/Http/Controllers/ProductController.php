<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    public $productAttribute;
    public function status(Request $request,$status,$id)
    {
        $product = Product::find($id);
        $product->status = $status;
        $product->save();
        $request->session()->flash('status', 'Color status update');
       return redirect()->back();
    }
    public function index()
    {
        return view('admin.product.product')
        ->with('products',Product::all());
    }

    public function manage_product()
    {
        return view('admin.product.manage_product')
        ->with('categorys',Category::all())
        ->with('colors',Color::all())
        ->with('sizes',Size::all());
    }
    public function store(Request $request)
    {
        $this->validate_data($request);
        $product = new Product();

        if($request->hasFile('image')){

            $image=$request->file('image');
            $new_name=time().$image->getClientOriginalName();
            $image->storeAs('public/uploads/post',$new_name);
            $product->image =$new_name;
        }
       $product->slug =Str::slug($request->name);
       $product->name = $request->name;
       $product->brand = $request->brand;
       $product->model = $request->model;
       $product->short_desc = $request->short_desc;
       $product->desc = $request->desc;
       $product->keywords = $request->keywords;
       $product->technical_specification = $request->technical_specification;
       $product->uses = $request->uses;
       $product->category_id = $request->category_id;
       $product->warranty = $request->warranty;
       $product->status = 0;
       $product->save();


   
       $skuArr = $request->sku;
       $mrpArr = $request->mrp;
       $priceArr = $request->price;
       $color_idArr = $request->color_id;
       $size_idArr = $request->size_id;
       $qtyArr = $request->qty;
       $imageArr = $request->attr_image;
       
     
       foreach($skuArr as $key=>$value){
            $productAttribute['product_id']=$product->id;
            $productAttribute['sku']=$skuArr[$key];
            $productAttribute['attri_image']='image';
            $productAttribute['price']=$priceArr[$key];
            $productAttribute['mrp']=$mrpArr[$key];
            $productAttribute['qty']=$qtyArr[$key];
            $productAttribute['size_id']=$size_idArr[$key];
            $productAttribute['color_id']=$color_idArr[$key];    
             
            DB::table('products_attr')->insert($productAttribute);
       }
       $request->session()->flash('success', 'Product created Successfully');
       return redirect()->back();
    }

    public function edit($id)
    {
        $product=Product::find($id);
        $result=DB::table('products_attr')->where(['product_id'=>$id])->get();
        return  view('admin.product.product_edit')
        ->with('product',$product)
        ->with('categorys',Category::all())
        ->with('colors',Color::all())
        ->with('sizes',Size::all())
        ->with([
            'results'=>$result
        ]);

        
    }
    public function update(Request $request,$id)
    {
            $this->validate_data($request,$id);
            
            $product=Product::find($id);

            $image_path=$product->image;//get path of image form database
            
            if($request->hasFile('image')==null){
                $product->image =$image_path;
            }else{
                $image=$request->file('image');//get image while user select image on view

                if(File::exists($image_path)){
                File::delete($image_path);
                }
                $new_name=time().$image->getClientOriginalName();
                $image->storeAs('public/uploads/post',$new_name);
                $product->image = $new_name;
            }

            $product->slug =Str::slug($request->name);
            $product->name = $request->name;
            $product->brand = $request->brand;
            $product->model = $request->model;
            $product->short_desc = $request->short_desc;
            $product->desc = $request->desc;
            $product->keywords = $request->keywords;
            $product->technical_specification = $request->technical_specification;
            $product->uses = $request->uses;
            $product->category_id = $request->category_id;
            $product->save(); 

            $request->session()->flash('update', 'Product updated Successfully');
            return redirect()->route('admin.product');
    }

  
    public function destroy(Request $request,$id)
    {
        $product=Product::find($id);
        $image_path=$product->image; 
        if(File::exists($image_path)) {
            File::delete($image_path);
        } 
        $product->delete();
        $request->session()->flash('danger', 'Delete Successfully');
        return redirect()->back();
    }

    public function validate_data($request,$id=''){

        if($id){
            $image_validate= 'mimes:jpeg,jpg,png';
        }else{
            $image_validate= 'required|mimes:jpeg,jpg,png';
        }
        $request->validate([
            'name' =>'required',
            'brand' =>'required',
            'model' =>'required',
            'short_desc'=>'required',
            'desc'=>'required',
            'keywords'=>'required',
            'technical_specification'=>'required',
            'uses'=>'required',
            'warranty'=>'required',
            'category_id'=>'required',
            'image' => $image_validate
        ]);
    }
}
