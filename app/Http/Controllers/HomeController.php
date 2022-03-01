<?php

namespace App\Http\Controllers;

use App\Models\doctor_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {

            $doctor = doctor_info::all();
            return view('user.home', compact('doctor'));
        }
    }
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->userType == '0') {
                $doctor = doctor_info::all();
                return view('user.home', compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
        }
    }
}
