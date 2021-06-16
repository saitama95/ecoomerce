<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->has('Admin_login')){
            return redirect('admin/dashboard');
        }else{
            return view('admin.login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function auth(Request $request)
    {
       $email = $request->email;
       $password = $request->password;

       $result = Admin::where([
           'email' =>$email,
       ])->first();
       if($result){
            if(Hash::check($password,$result->password)){
                $request->session()->put('Admin_login', true);
                $request->session()->put('Admin_id',$result->id);
                return redirect('admin/dashboard');
            }else{
                $request->session()->flash('error', 'Invalid email and password');
                return redirect('admin');
            }
       }else{
           $request->session()->flash('error', 'Invalid email and password');
            return redirect('admin');
       }
    }
    // public function uodatepassword()
    // {
    //     $admin = Admin::find(1);
    //     $admin->password = Hash::make('12345678');
    //     $admin->save();
    // }
}
