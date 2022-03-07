<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {

            $doctor = doctor_info::all();
            $items = doctor_info::pluck('speciality');
            return view('user.home', compact('doctor','items'));
        }
    }
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->userType == 'user') {
                $doctor = doctor_info::all();
                $items = doctor_info::pluck('speciality');
                return view('user.home', compact('doctor','items'));
            } else {
                return view('admin.home');
            }
        } else {
        }
    }
   
    
   
}
