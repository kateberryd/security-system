<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Sentinel;

class UsersController extends Controller
{
    //
    public function index (){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        $page_title = 'users';
        $users = User::orderBy('created_at', 'desc')->get();
        return view('pages.users.list.index', compact('page_title', 'users'));
      }
    }
    
    public function create (){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        return view('pages.users.add.index');
      }
    }
    
    
    public function store(Request $request){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
      $str = strtolower($request->first_name);
        $this->validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required', 
          'country' => 'required', 
          'state' => 'required', 
          'address' => 'required', 
          'phone_number' => 'required',
        ]);
    
        try {
         
            $credentials = [
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'email'    => $request->email,
                'password' => bcrypt('secret'),
                'user_role' => 'user',
                'slug' => $str,
                'address' => $request->address,
                'country' => $request->country,
                'state' => $request->state,
              ];
          
          
              $userRole = 'user';
              $user = User::create($credentials);
              $role = Sentinel::findRoleBySlug($userRole);
              $role->users()->attach($user);
              // $this->sendEmail($user, $activation->code);
              
             $notification = array(
                'message' => "User $user->email created successfully",
                'alert-type' => 'success'
          );		
    
          if($user->id) {
            return redirect()->back()->with($notification);;
          } else {
            
            return back()->withInput()->with('error', 'Could not create user. Try again!');
          }
        } catch (QueryException $e) {
          
          $error = array(
            'message' => "Account for $request->email already exists!",
            'alert-type' => 'error'
          );
    
          $errorCode = $e->errorInfo[1];
          if($errorCode == 1062){
            return redirect()->back()->withInput()->with($error);
          }
        }
      }
    }
    
    
    public function edit($id){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
      $user =  User::where('id', $id)->first();
       return view('pages.users.edit.index', compact('user'));
      }
   }
    
   public function update(Request $request, $id) {
    if(!Sentinel::forcecheck()){
      return redirect()->route('login.get');
    }
    else{
    $user =  User::where('id', $id)->first();
    $str = strtolower($request->first_name . $request->last_name);
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->phone_number = $request->phone_number;
    $user->address = $request->address;
    $user->state = $request->state;
    $user->country = $request->country;
    $user->slug = $str;
    $user->save();
    if($user->id){
        $notification = array(
            'message' => "Updated duty post successfully",
            'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);
    } else {
        $error = array(
          'message' => 'Error updating duty post. Try again',
          'alert-type' => 'error'
        );
        return back()->with($error);
      } 
    }
}
    
    public function delete($id)
    {
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        $user =  User::where('id', $id)->first();
        if ($user->delete()) {
          $notification = array(
            'message' => "User deleted successfully",
            'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);
         } else {
          $error = array(
            'message' => 'Error Deleting User',
            'alert-type' => 'error'
          );
          return back()->with($error);
        }    
    }
  }
    
  
}
