<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Authentication\AuthenticationContract;
use Sentinel;

class AuthenticationController extends Controller
{
 
    
    public function index()
    {
        //
        
        return view('pages.auth.login');
    }
    
    public function loginPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
          ]);
  
          $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
          ];
  
                  
          try {
            if(Sentinel::forceauthenticate($credentials)) {
                  $authUser = Sentinel::getUser();
                  try {
                    if (Sentinel::getUser()->roles()->first()->slug === 'admin') {						
                        return redirect()->route('dashboard.index');                  
                    }
                  } catch (\BadMethodCallException $e) {
                    return redirect()->route('login.get')->with('error', 'Your Session has expired. Please login again!');
                  }
            } else {		
                	
                  return redirect()->back()->with('error', 'Ops... Your Login Credentials did not match');
            }
          } catch(ThrottlingException $e) {
            $delay = $e->getDelay();
            return redirect()->back()->with(['error' => "Ops.. You have been banned for $delay seconds."]);
          } catch(NotActivatedException $e){
            return redirect()->back()->with(['error' => 'Ops... Your account is not yet activated, please check your email for activation code or link']);
          }
    }
    
    public function store(Request $request)
    {
        //
    }
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }
    
    public function update(Request $request, $id)
    {
        //
    }
    
    public function delete($id)
    {
        //
    }
    public function logout() {
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }else{
        Sentinel::logout(null, true);
        return redirect()->route('login.get');
      }
     
    }
}
