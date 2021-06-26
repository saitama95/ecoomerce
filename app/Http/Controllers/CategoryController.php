<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function status(Request $request,$status,$id)
    {
        $stat = Category::find($id);
        $stat->status = $status;
        $stat->save();
       return redirect()->back();
    }
    public function index()
    {
        $result['data'] = Category::all();
        return view('admin.category',$result);
    }

    public function manage_category($id='') 
    {   
        if($id>0){
            $arr=Category::where(['id'=>$id])->get();
            $result['name'] = $arr['0']->name;
            $result['id'] = $arr['0']->id;
        }else{
            $result['name']='';
            $result['id'] = '';
        }
    
        return view('admin.manage_category',$result);
    }

    public function store(Request $request)
    {
        if($request->id>0){
            $validate = 'required';
            $category=Category::find($request->id);
            $message='Update Successfully';
        }else{
            $validate = 'required|unique:categories,name,except,id';
            $category = new Category();
            $message='Create Successfully';   
        }
        $request->validate([
            'name' => $validate
        ]);
       $category->name = $request->name;
       $category->slug = Str::slug($request->name);
       $category->status = 0;
       $category->save();
       $request->session()->flash('message', $message);
       return redirect('admin/category');
    }
    public function destroy(Request $request,$id)
    {
        $category=Category::find($id);
        $category->delete();
        $request->session()->flash('danger', 'Delete Successfully');
        return redirect()->back();
    }
}
