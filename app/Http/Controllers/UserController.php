<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\RegMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
       $this->middleware('auth',[
            'except'=>['index','show','create','store','confirmEmailToken']
       ]);
       $this->middleware('guest',[
            'only'=>['create','store']
       ]);
    }
    public function index()
    {
        //
        $users=User::paginate(10);
        // dd($user->toArray());
        return view('user.index',compact('users'));
        // dd($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
      $data=$this->validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|unique:users|email',
            'password'=>'required|min:5|confirmed',
        ]);
        $data['password']=bcrypt($data['password']);
        $user=User::create($data);

        // $status=Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
        Mail::to($user)->send(new RegMail($user));

        session()->flash('success','请查看邮箱完成验证');

        // return $request->all();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        // dd($user->toArray());
        // dd(compact('user'));
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //编辑当前的用户
        $this->authorize('update',$user);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required|min:3',
            'password' => 'nullable|min:5|confirmed',
        ]);
        $user->name=$request->name;
        if ($request->password) {
            // dd(123);
            $user->password=bcrypt($request->password);
        }
        $user->save();
        session()->flash('success','修改成功');
        return redirect()->route('user.show',$user);
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $this->authorize('delete',$user);
        $user->delete();
        session()->flash('success','删除成功');
        return redirect()->route('user.index');
    }


    public function confirmEmailToken($token)
    {
       $user=User::where('email_token',$token)->first();
    //    $user=User::find(2);
       if($user){
           $user->email_active=true;
           $user->save();
        //    Auth::attempt(['email' => $user->email, 'password' =>$user->password]);
           Auth::login($user);
           session()->flash('success','验证成功');
           return redirect('/');
       }
       session()->flash('danger','邮箱验证失败');
       return
       redirect('/');

    }
}
