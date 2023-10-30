<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\User;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    function user(){
        $users = User::paginate(5);
        return view('user', compact('users'));
    }

    function create(){
        return view('form');
    }
 

    function usereinsert(Request $request){
        $request->validate(
            [
                'name'=>'required|max:50',
                'email'=>'required',
            ],
            [
                'name.required'=>'กรุณากรอกชื่อ',
                'name.max'=>'ชื่อไม่ควรเกิน 50 ตัวอักษร',
                'email.required'=>'กรุณากรอกอีเมล',
                'email.email'=>'รูปแบบอีเมลไม่ถูกต้อง'
            ]
        );
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        User::usereinsert($data);
        return redirect('/author/user');
    }
    
    
    function delete($id){
        Blog::find($id)->delete ();
        return view('author/user');
    }  

    function useredit($id){
        $user = User::find($id);
        return view('useredit', compact('user'));
    }    


    function userupdate(Request $request,$id){
        $request->validate(
            [
                'name'=>'required|max:50',
                'email'=>'required'
            ],
            [
                'name.required'=>'กรุณากรอกข้อมูล',
                'name.max'=>'ชื่อไม่ควรเกิน 50 ตัวอักษร',
                'email.required'=>'กรุณากรอกอีเมล',
                'email.email'=>'รูปแบบอีเมลไม่ถูกต้อง',
            ]
        );
        $data=[
            'name'=>$request->name,
            'email'=>$request->email
        ];
        Blog::find($id)->userupdate($data);
        return redirect('/author/user');
    }

    //about
    function about(){
        $users = User::paginate(5);
        return view('about', compact('users'));
    }
    
}
