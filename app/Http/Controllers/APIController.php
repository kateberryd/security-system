<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Sentinel;

class APIController extends Controller
{
    //
    
    public function login(Request $request)
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
                    if (Sentinel::getUser()->roles()->first()->slug === 'user') {						
                      return response()->json([
                        'message' => 'login successfully',
                        'data' => $authUser
                      ], 200);               
                    }
                  } catch (\BadMethodCallException $e) {
                    return response()->json([
                        'message' => 'Internal error',
                        'data' => $e
                      ], 500);
                  }
            } else {		
                return response()->json([
                    'message' => 'Invalid credentials',
                  ], 400); 	
            }
          } catch(ThrottlingException $e) {
            $delay = $e->getDelay();
            return response()->json([
                'message' => 'There was an error',
                'data' => $delay
              ], 401);
          } catch(NotActivatedException $e){
              
            return response()->json([
                'message' => 'There was error',
                'data' => $e
              ], 500);
          }
    }
    
    
    public function store(Request $request){
        $str = strtolower($request->first_name);
        //   $this->validate($request, [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required', 
        //     'country' => 'required', 
        //     'state' => 'required', 
        //     'address' => 'required', 
        //     'phone_number' => 'required',
        //   ]);
      
          try {
           
              $credentials = [
                  'first_name' => $request->first_name,
                  'last_name' => $request->last_name,
                  'phone_number' => $request->phone_number,
                  'email'    => $request->email,
                  'password' => bcrypt($request->password),
                  'user_role' => 'user',
                  'slug' => $str,
                  'address' => $request->address,
                  'country' => "Nigeria",
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
                return response()->json([
                    'message' => 'Registration was successful',
                    'data' => $user
                  ], 200);
            } else {
              
                return response()->json([
                    'message' => 'There was error',
                  ], 500);            }
          } catch (QueryException $e) {
      
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return response()->json([
                    'message' => 'There was error',
                    'data' => $e
               ], 500);            }
          }
        }
      }

