<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //show register form
    public function createOwner() {
        return view('users.ownerRegister');
    }
    public function createBuyer() {
        return view('users.buyerRegister');
    }

    //create new user
    public function  store(Request $request){
        $dataFields = $request->validate([
        
            'name' =>['required','min:3'],
            'email' =>['required','email',Rule::unique('users','email')],
            'telephone' =>['required',Rule::unique('users','telephone')],
            'password' =>['required','confirmed','min:6'],
            'role'=>['required']
        ]);

        //hash password
        $dataFields['password']=bcrypt($dataFields['password']);

        $user = User::create($dataFields);

        

        //login
        auth()->login($user);

        $role = auth()->user()->role;
        if($role == "buyer"){
        return redirect('/properties')->with('message','Account created and logged in successfully!');
        }
        else{
        return redirect('/property')->with('message','Account created and logged in successfully!');
        }
    }

    //logout user
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out');
    }

    //show login form
    public function login(){
        return view('users.login');

    }

    //authenticate user
    public function authenticate(Request $request){

        $dataFields = $request->validate([
           
            'email' =>['required','email'],
            'password' =>'required'
        ]);

        if(auth()->attempt($dataFields)){
            $request->session()->regenerate();

            $role = auth()->user()->role;
            if($role == "buyer"){
            return redirect('/properties')->with('message','you are now logged in !');
            }
            else{
            return redirect('/property')->with('message','you are now logged in !');
            }
        }
        return back()->withErrors(['email'=>'Invalid Credential'])->onlyInput('email');
    }

}
