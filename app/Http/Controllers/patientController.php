<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;



class patientController extends Controller
{


    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function profile()
    {

        return view('profile');
    }







    public function store(Request $request)
    {


        // $request->validate([

        //     'rfname'=>'required',
        //     'rlname'=>'required',
        //     'remail'=>'required',
        //     'rNum'=>'required',
        //     'rpassword'=>'required'

        // ]);


        $request->validate([
            'rfname' => 'required|string|min:3|max:15',
            'rlname' => 'required|string|min:3|max:15',

            'remail' => 'required|email|unique:users,email',
            'rNum' => 'required|digits:10||unique:patients,Num',
            'rpassword' => 'required|min:4',
        ], [

            'rfname.required' => 'First name is required.',
            'rfname.string' => 'First name must be a valid string.',
            'rfname.min' => 'First name must be at least 3 characters.',
            'rfname.max' => 'First name cannot exceed 50 characters.',

            'rlname.required' => 'Last name is required.',
            'rlname.string' => 'Last name must be a valid string.',
            'rlname.min' => 'Last name must be at least 3 characters.',
            'rlname.max' => 'Last name cannot exceed 50 characters.',

            'remail.required' => 'Email address is required.',
            'remail.email' => 'Please provide a valid email address.',
            'remail.unique' => 'This email address is already in use.',

            'rNum.required' => 'Mobile number is required.',
            'rNum.digits' => 'Mobile number must be exactly 10 digits.',
            'rNum.unique' => 'Mobile number already been taken',

            'rpassword.required' => 'Password is required.',
            'rpassword.min' => 'Password must be at least 4 characters long.',
        ]);





        User::create([

            'name' => $request->rfname,
            'email' => $request->remail,
            'password' => $request->rpassword,

        ]);



        $patient = new Patient();
        $patient->fname = $request->rfname;
        $patient->lname = $request->rlname;
        $patient->city = '';
        $patient->address = '';
        $patient->age = '';
        $patient->emgcontact = '';
        $patient->email = $request->remail;
        $patient->Num = $request->rNum;
        $patient->password = $request->rpassword;

        $patient->save();


        return redirect()->back()->with('success', 'Your data has been saved successfully!');


    }



    public function update(Request $request)
    {



        $patient = Patient::where('email', $request->email)->first();


        $request->validate([
            'fname' => 'required|string|min:3|max:15',
            'lname' => 'required|string|min:3|max:15',

            'address' => 'required|min:10|max:150',
            'age' => 'required|digits:2',
            'emgcontact' => 'required|digits:10',
        ], [

            'fname.required' => 'First name is required.',
            'fname.string' => 'First name must be a valid string.',
            'fname.min' => 'First name must be at least 3 characters.',
            'fname.max' => 'First name cannot exceed 15 characters.',

            'lname.string' => 'Last name must be a valid string.',
            'lname.min' => 'Last name must be at least 3 characters.',
            'lname.required' => 'Last name is required.',
            'lname.max' => 'Last name cannot exceed 50 characters.',

            'address.required' => 'Address is required.',
            'address.min' => 'Please provide a valid Address.',
            'address.max' => 'Please provide a valid Address.',

            'emgcontact.required' => 'Mobile number is required.',
            'emgcontact.digits' => 'Mobile number must be exactly 10 digits.',
            // 'emgcontact.unique' => 'Mobile number already been taken',


        ]);



        $patient->fname = $request->fname;
        $patient->lname = $request->lname;
        $patient->city = '';
        $patient->address = $request->address;
        $patient->age = $request->age;
        $patient->Num = $request->emgcontact;
        $patient->emgcontact = '';


        $patient->save();

        if ($patient) {
            session(['patient' => $patient]); // Set session data
            return redirect()->back()->with('success', 'Your data has been saved successfully!');

        }






    }




    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);






        $credentials = $request->only(['email', 'password']);


         
        
        if (Auth::guard('web')->attempt($credentials)) {
            $patient = Patient::where('email', $request->email)->first();

            // Store patient in the session for persistence
            session(['patient' => $patient]);

            return redirect()->route('profile');
        } else {
            return redirect()->back()
                ->with('error', 'Invalid email or password')
                ->withInput();
            // return response()->json(['success' => false, 'message' => 'Invalid credentials']);
        }






    }





    public function patientDelete($request)
    {

  

        $Pdeleted = Patient::where('email', $request)->delete();
        $Pdeleted = User::where('email', $request)->delete();
        // return $request;

        if ($Pdeleted) {
            return redirect()->back()->with('success', 'Your data has been saved successfully!');
        } else {
            return redirect()->back()->with('success', 'No patient found with the provided email');
        }

    }



























}
