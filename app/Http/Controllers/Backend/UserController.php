<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Users;

class UserController extends Controller
{
    public function view(){
        $data['allData']=users::all();
        return view('backend.user.view-user',$data);
    }

    public function add(){
        return view('backend.user.add-user');

    }

    public function store(Request $request){
        $this->validate($request,[
            'usertype'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
        ]);
     $data =new users();
     $data->usertype = $request->usertype;
     $data->name = $request->name;
     $data->email = $request->email;
     $data->password = bcrypt($request->password);
     $data->save();
     $notification = array(
        'message' => 'User Inserted Successfully',
        'alert-type' => 'success'
     );
     return  redirect()->route('users.view')->with($notification);
    }
    public function edit($id){
        $editData=users::find($id);
        return view('backend.user.edit-user',compact('editData'));
    }

    public function update(Request $request,$id){
        $data =users::find($id);
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        $notification = array(
            'message' => 'User Data Update Successfully',
            'alert-type' => 'success'
         );
        return  redirect()->route('users.view')->with($notification);

    }
    public function delete($id){
        $user =users::find($id);
        if(file_exists('upload/user_images/'. $user->image) AND ! empty($user->image)){
            unlink('upload/user_images/'.$user->image);
        }
        $user->delete();
        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'error'
         );

        return  redirect()->route('users.view')->with($notification);

    }

}
