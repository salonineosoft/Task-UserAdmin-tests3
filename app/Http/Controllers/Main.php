<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Main extends Controller
{
    //
    public function add()
    {
        return view('add');
    }
    public function insert(Request $req)
    {
        //return $req->input();
        $validateform=$req->validate([
            'firstname'=>'required | min:2 | max:10',
            'lastname'=>'required | min:2 | max:10',
            'email'=>'required | regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+$/',
            'mob'=>'required|regex:/^[+]?(\d{1,2})?[\s.-]?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'city'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'status'=>'required',
            'image'=>'required | mimes:jpg,jpeg,png'
        ],[
             'firstname.required'=>'name is required',
             'lastname.required'=>'name is required',
             'email.required'=>'Enter valid email',
             'mob.required'=>'Enter valid Mobile Number',
             'mob.regex'=>'Enter valid mobile Number',
             'city.required'=>'Enter city',
             'gender.required'=>'gender is required',
             'age.required'=>'age is required',
             'status.required'=>'status is required',
        ]);
        if($validateform)
        {
            $filename="Image-".$req->email.".".$req->image->extension();//we r creating image path
           if($req->image->move(public_path('uploads'),$filename)){//uplloading in public uploads folder
               // return back()->with("success", "Done");  
               DB::table('employees')->insert([
                'firstname'=>$req->firstname,
                'lastname'=>$req->lastname,
                'email'=>$req->email,
                'mobile'=>$req->mob,
                'city'=>$req->city,
                'gender'=>$req->gender,
                'age'=>$req->age,
                'status'=>$req->status,
                'image'=>$filename
               ]); 
               return redirect('show');
            }
            else{
            return back()->with("error", "uploading error");
        }
        }
    }
    public function show()
    {
        $show =DB::table('employees')->get();
        return view('show',compact('show'));
    }
    public function editt($id){
        $user=DB::table('employees')->where('id',$id)->first();
        return view('edit',compact('user'));
    }
    public function updated(Request $req)
    {
        //return $req->input();
        $validateform=$req->validate([
            'firstname'=>'required | min:2 | max:10',
            'lastname'=>'required | min:2 | max:10',
            'email'=>'required | regex:/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+$/',
            'mob'=>'required|regex:/^[+]?(\d{1,2})?[\s.-]?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/',
            'city'=>'required',
            'gender'=>'required',
            'age'=>'required',
            'status'=>'required',
        ],[
             'firstname.required'=>'name is required',
             'lastname.required'=>'name is required',
             'email.required'=>'Enter valid email',
             'mob.required'=>'Enter valid Mobile Number',
             'mob.regex'=>'Enter valid mobile Number',
             'city.required'=>'Enter city',
             'gender.required'=>'gender is required',
             'age.required'=>'age is required',
             'status.required'=>'status is required',
        ]);
        
        if($validateform){
            DB::table('employees')->where('id',$req->id)->update([
                'firstname'=> $req->firstname,
                'lastname'=>$req->lastname,
                'email'=>$req->email,
                'mobile'=>$req->mob,
                'city'=>$req->city,
                'gender'=>$req->gender,
                'age'=>$req->age,
                'status'=>$req->status,
        ]);
        return redirect('show');
        }
    }
    public function delete($id){
        DB::table('employees')->where('id',$id)->delete();
        return back()->with('msg',"deleted");
    }
}


