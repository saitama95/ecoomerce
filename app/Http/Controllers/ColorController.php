<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function status(Request $request,$status,$id)
    {
        $stat = Color::find($id);
        $stat->size = $status;
        $stat->save();
        $request->session()->flash('status', 'Color status update');
       return redirect()->back();
    }
    public function index()
    {
        return view('admin.color.color')->with('colors',Color::all());
    }

    public function manage_color()
    {
        return view('admin.color.manage_color');
    }
    public function store(Request $request)
    {
        $request->validate([
            
            'color' =>'required|unique:colors,color',
        ]);
       $color = new Color();
       $color->color = $request->color;
       $color->size = 0;
       $color->save();
       $request->session()->flash('success', 'Color created Successfully');
       return redirect()->back();
    }

    public function edit($id)
    {
        $color=Color::find($id);
        return  view('admin.color.color_edit')->with('color',$color);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            
            'color' =>'required',
        ]);
        $color=Color::find($id);
        $color->color = $request->color;
        $color->save();
        $request->session()->flash('update', 'Color updated Successfully');
        return redirect()->route('admin.color');
    }

  
    public function destroy(Request $request,$id)
    {
        $color=Color::find($id);
        $color->delete();
        $request->session()->flash('danger', 'Delete Successfully');
        return redirect()->back();
    }
}
