<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DutyPost;
use Sentinel;


class DutyPostController extends Controller
{
    //
    public function index (){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        $dutyposts = DutyPost::orderBy('created_at', 'desc')->get();
        return view('pages.post.list.index', compact('dutyposts'));
      }
    }
    public function create(){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
       
        return view('pages.post.add.index');
      }
    }
    
    public function store(Request $request){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
          ]);
        
        $data = new DutyPost;
        $data->name = $request->name;
        $data->location = $request->location;
        $data->save();
        if($data->id){
            $notification = array(
                'message' => "Created duty post successfully",
                'alert-type' => 'success'
              );
              return redirect()->back()->with($notification);
        } else {
            $error = array(
              'message' => 'Error creating duty post. Try again',
              'alert-type' => 'error'
            );
            return back()->with($error);
          } 
      }
     }
    
    public function edit($id){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
       $data =  DutyPost::where('id', $id)->first();
        return view('pages.post.edit.index', compact('data'));
      }
    }
    
    public function postActions (Request $request, $id){
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
      if($request->type == 'accept'){
          $data = LeaveRequest::where('id', $id)->update(array('status' => 1));
          if($data == 1){
            return response()->json([
              'message' => 'Great success! request accepted ',
              'data' => $data
          ]);
          }else{
            return response()->json([
              'message' => 'There was an errr ',
          ]);
          }
      }
      
      if($request->type == 'decline'){
          $data = LeaveRequest::where('id', $id)->update(array('status' => 2));
          if($data == 1){
            return response()->json([
              'message' => 'Request declined  ',
              'data' => $data
          ]);
          }else{
            return response()->json([
              'message' => 'There was an errr ',
          ]);
          }
      } 
    }
  }
    
     public function update(Request $request, $id) {
      if(!Sentinel::forcecheck()){
        return redirect()->route('login.get');
      }
      else{
        $data =  DutyPost::where('id', $id)->first();
        $data->name = $request->name;
        $data->location = $request->location;
        $data->save();
        if($data->id){
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
        //
        if(!Sentinel::forcecheck()){
          return redirect()->route('login.get');
        }
        else{
        $dutyPost =  DutyPost::where('id', $id)->first();
        if ($dutyPost->delete()) {
          $notification = array(
            'message' => "Data deleted successfully",
            'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);
         } else {
          $error = array(
            'message' => 'Error Deleting data',
            'alert-type' => 'error'
          );
          return back()->with($error);
        }    
      }
    }
}
