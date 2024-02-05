<?php

namespace App\Http\Controllers;

use App\Models\Adminl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Facades\auth;

class AdminlController extends Controller
{
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
            
        }else {
            return view('admin.adminlogin');
        }
        return view('admin.adminlogin');
    }

    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        // $result=Adminl::where(['email'=>$email, 'password'=>$password])->get();
        $result=Adminl::where(['email'=>$email])->first();
        if ($result) {
            if (Hash::check($request->post('password'), $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
        }else {
            $request->session()->flash('error','please enter correct password');
            return redirect('admin');
        }
           
        }else {
            $request->session()->flash('error','please enter valid login details');
            return redirect('admin');
        }
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    
    // public function updatepassword()
    // {
    //    $r=Adminl::find(1);
    //    $r->password=Hash::make('sarita0611');
    //    $r->save();
    // }

   
    public function edit(Adminl $adminl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adminl $adminl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adminl $adminl)
    {
        //
    }
}
