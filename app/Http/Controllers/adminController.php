<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class adminController extends Controller
{



    public function adminlogin()
    {
        return view(view: 'adminlogin');
    }


    public function adminreg()
    {
        return view(view: 'adminreg');
    }



    public function dashboard()
    {

        $patients = Patient::all();
        return view('dashboard', compact('patients'));
    }


    public function adminloginprocess(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);






 
        $credentials = $request->only(['email', 'password']);


        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && $admin->password === $credentials['password']) {

            session(['admin' => $admin]);

            return redirect()->route('dashboard');


        } else {
          
            return redirect()->back()
                    ->with('error','Invalid email or password')
                    ->withInput();
            

        }






        // $credentials = $request->only(['email', 'password']);


        // if (Auth::guard('web')->attempt($credentials)) {

        // } else {
        //    
        //     // return response()->json(['success' => false, 'message' => 'Invalid credentials']);
        // }











    }









}
