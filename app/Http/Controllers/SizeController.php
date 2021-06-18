<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function status(Request $request,$status,$id)
    {
        $stat = Size::find($id);
        $stat->status = $status;
        $stat->save();
       return redirect()->back();
    }
    public function index()
    {
        return view('admin.size.size')->with('sizes',Size::all());
    }

    public function manage_size()
    {
        return view('admin.size.manage_size');
    }
    public function store(Request $request)
    {
        $request->validate([
            'size' =>'required|unique:coupans,name',
        ]);
       $size = new Size();
       $size->size = $request->size;
       $size->status = 0;
       $size->save();
       $request->session()->flash('success', 'Size created Successfully');
       return redirect()->back();
    }

    public function edit($id)
    {
        $size=Size::find($id);
        return  view('admin.size.size_edit')->with('size',$size);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'size' =>'required|unique:sizes,size',
        ]);
        $size=Size::find($id);
        $size->size = $request->size;
        $size->save();
        $request->session()->flash('update', 'Size updated Successfully');
        return redirect()->route('admin.size');
    }

  
    public function destroy(Request $request,$id)
    {
        $size=Size::find($id);
        $size->delete();
        $request->session()->flash('danger', 'Delete Successfully');
        return redirect()->back();
    }
}
