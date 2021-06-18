<?php

namespace App\Http\Controllers;

use App\Models\Coupan;
use Illuminate\Http\Request;

class CoupanController extends Controller
{
    public function status(Request $request,$status,$id)
    {
        $stat = Coupan::find($id);
        $stat->status = $status;
        $stat->save();
       return redirect()->back();
    }
    public function index()
    {
        return view('admin.coupan.coupan')->with('coupans',Coupan::all());
    }

    public function manage_coupan()
    {
        return view('admin.coupan.manage_coupan');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|unique:coupans,name',
            'code' =>'required|unique:coupans,code',
            'value' =>'required|unique:coupans,value',
        ]);
       $coupan = new Coupan();
       $coupan->name = $request->name;
       $coupan->code = $request->code;
       $coupan->value = $request->value;
      
       $coupan->save();
       $request->session()->flash('success', 'Coupan created Successfully');
       return redirect()->back();
    }

    public function edit($id)
    {
        $coupan=Coupan::find($id);
        return  view('admin.coupan.coupan_edit')->with('coupan',$coupan);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' =>'required|unique:categories,name,except,id',
        ]);
        $coupan=Coupan::find($id);
        $coupan->name = $request->name;
        $coupan->code = $request->code;
         $coupan->value = $request->value;
      
         $coupan->save();
        $request->session()->flash('update', 'Coupan updated Successfully');
        return redirect()->route('admin.coupan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $coupan=Coupan::find($id);
        $coupan->delete();
        $request->session()->flash('danger', 'Delete Successfully');
        return redirect()->back();
    }
}    