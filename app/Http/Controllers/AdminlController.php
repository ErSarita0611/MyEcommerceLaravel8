<?php

namespace App\Http\Controllers;

use App\Models\Adminl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Facades\auth;

class AdminlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.adminlogin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        $result=Adminl::where(['email'=>$email, 'password'=>$password])->get();
        if (isset($result['0']->id)) {
            $request->session()->put('ADMIN_LOGIN', true);
            $request->session()->put('ADMIN_ID', $result['0']->id);
            return redirect('admin/dashbord');
            
        }else {
            $request->session()->flash('error','please enter valid login details');
            return redirect('admin');
        }
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Adminl $adminl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
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
