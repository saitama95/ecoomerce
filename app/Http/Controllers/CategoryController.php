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
        return view('admin.category')->with('categorys',Category::all());
    }

    public function manage_category()
    {
        return view('admin.manage_category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:categories,name,except,id',
        ]);
       $category = new Category();
       $category->name = $request->name;
       $category->slug = Str::slug($request->name);
       $category->status = 0;
       $category->save();
       $request->session()->flash('success', 'Category craete Successfully');
       return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return  view('admin.category_edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' =>'required|unique:categories,name,except,id',
        ]);
        $category=Category::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();
        $request->session()->flash('update', 'Category update Successfully');
        return redirect()->route('admin.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $category=Category::find($id);
        $category->delete();
        $request->session()->flash('danger', 'Delete Successfully');
        return redirect()->back();
    }
}
