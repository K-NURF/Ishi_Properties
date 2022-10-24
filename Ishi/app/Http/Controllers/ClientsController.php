<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClientsController extends Controller
{
        //show register form
        public function create() {
            return view('clients.register');
        }
    
        //create new user
        public function  store(Request $request){
            $dataFields = $request->validate([
               
                'name' =>['required','min:3'],
                'email' =>['required','email',Rule::unique('clients','email')],
                'password' =>['required','confirmed','min:6'],
            ]);
    
            //hash password
            $dataFields['password']=bcrypt($dataFields['password']);
    
            $user = Clients::create($dataFields);
    
            
    
            //login
            auth()->login($user);
    
            return redirect('/properties')->with('message','Account created and logged in successfully!');
    
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
            return view('clients.login');
    
        }
    
        //authenticate user
        public function authenticate(Request $request){
    
            $dataFields = $request->validate([
               
                'email' =>['required','email'],
                'password' =>'required'
            ]);
    
            if(auth()->attempt($dataFields)){
                $request->session()->regenerate();
                return redirect('/properties')->with('message','you are now logged in !');
            }
            return back()->withErrors(['email'=>'Invalid Credential'])->onlyInput('email');
        }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
