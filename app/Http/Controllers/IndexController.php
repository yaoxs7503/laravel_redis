<?php

namespace App\Http\Controllers;

use App\Mail\RegMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    //
    public function home()
    {
    // return view('home');
    $user=User::find(2);
    // Mail::to($user)->send(new RegMail($user));
    return view('home');
    }
}
