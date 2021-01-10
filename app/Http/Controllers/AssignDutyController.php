<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\DutyPost;
use App\Models\AssignDuty;
use Sentinel;
class AssignDutyController extends Controller
{
    //
    
    public function index (){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        $assignDuties = AssignDuty::orderBy('created_at', 'desc')->get();
        return view('pages.assign-duty.list.index', compact('assignDuties'));
      }
    }
    
    public function create (){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        $users = User::orderBy('created_at', 'desc')->get();
        $duties = DutyPost::orderBy('created_at', 'desc')->get();
        return view('pages.assign-duty.add.index', compact('users', 'duties'));
      }
    }
    
    public function store(Request $request){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        // dd($request->all());
        $this->validate($request, [
            'user_id' => 'required',
            'duty_id' => 'required',
          ]);
        
        $data = new AssignDuty;
        $data->user_id = $request->user_id;
        $data->duty_id = $request->duty_id;
        $data->save();
        if($data->id){
            $notification = array(
                'message' => "Assign Duty successfully",
                'alert-type' => 'success'
              );
              return redirect()->back()->with($notification);
        } else {
            $error = array(
              'message' => 'Error Assigning Duty. Try again',
              'alert-type' => 'error'
            );
            return back()->with($error);
          } 
     }
    }
}
