<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor_info;
use App\Models\news;
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
            $news = news::all();
            $doctor = doctor_info::all();
            $items = doctor_info::pluck('speciality');
            return view('user.home', compact('doctor','items','news'));
        }
    }
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->userType == 'user') {
                $news = news::all();
                $doctor = doctor_info::all();
                $items = doctor_info::pluck('speciality');
                return view('user.home', compact('doctor','items','news'));
            } else {
                return view('admin.home');
            }
        } else {
        }
    }
   
    
   
}
