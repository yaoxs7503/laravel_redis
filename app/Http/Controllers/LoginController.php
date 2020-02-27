<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(){
                return view('login');
    }
    public function store(Request $request){
        $data=$this->validate($request,[
            'password'=>'required|min:5',
            'email'=>'email|required'
        ]);
        // dd($data);
       if(Auth::attempt($data)){
           session()->flash('success','登录成功');
           return redirect()->route('home');
       }else{
           session()->flash('danger','密码错误');
           return redirect()->back();
       };
        // dd($request->all());
        dd($abc);
    }
    public function logout(){
        Auth::logout();
        session()->flash('success','退出成功');
        return redirect()->route('home');
    }
}
