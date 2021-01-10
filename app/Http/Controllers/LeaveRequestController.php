<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;
use Sentinel;

class LeaveRequestController extends Controller
{
    //
    public function index (){
        if(!Sentinel::forcecheck()){
            return redirect()->route('login.get');
          }
          else{
            $leaveRequests = LeaveRequest::orderBy('created_at', 'desc')->get();
            return view('pages.leave.list.index', compact('leaveRequests'));
          }
    }
    
    
    public function requestActions (Request $request, $id){
        if($request->type == 'accept'){
            $data = LeaveRequest::where('id', $id)->update(array('status' => 1));
            return $data;
        }
        
        if($request->type == 'decline'){
            $data = LeaveRequest::where('id', $id)->update(array('status' => 2));
            return $data;
        } 
    }
    
    
    public function store(Request $request){
        if(!Sentinel::forcecheck()){
            return redirect()->route('login.get');
          }
         else{
        $this->validate($request, [
            'title' => 'required',
            'duration' => 'required',
            'description' => 'required',
          ]);
        
        $data = new LeaveRequest;
        $data->title = $request->title;
        $data->duration = $request->duration;
        $data->status = $request->status;
        $data->description = $request->description;
        $data->user_id = $request->user_id;
        $data->save();
        if($data->id){
            return response()->json([
                'message' => 'Great success! Request created',
                'data' => $data
            ]);
         } 
        
         else {
            return response()->json([
                'message' => 'Error deleting Request Try. Again',
            ]);
         }    
        }
     }
    
    
    public function findById ($id){
        if(!Sentinel::forcecheck()){
            return redirect()->route('login.get');
          }
          else{
            $data =  LeaveRequest::where('id', $id)->get();
            if ($data->id ){
            return response()->json([
               'message' => 'Great success!',
               'data' => $data,
           ]);
         } else {
           return response()->json([
               'message' => 'Error getting data Try. Again',
           ]);
        }   
    } 
    }
    
    
     public function delete($id)
     {
         //
         if(!Sentinel::forcecheck()){
            return redirect()->route('login.get');
          }
          else{
            $data =  LeaveRequest::where('id', $id)->first();
            if ($data->delete()) {
            return response()->json([
                'message' => 'Great success! Request deleted',
            ]);
          } else {
            return response()->json([
                'message' => 'Error deleting Request Try. Again',
            ]);
         }  
        }  
     }
}
