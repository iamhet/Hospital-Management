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
            $doctor = doctor_info::all();
            $items = doctor_info::pluck('speciality');
            $news = news::latest()->take(3)->get();
            return view('user.home', compact('doctor', 'items', 'news', ));
        }
    }
    
    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->userType == 'user') {
                $news = news::latest()->take(3)->get();
                $doctor = doctor_info::all();
                $items = doctor_info::pluck('speciality');
                return view('user.home', compact('doctor', 'items', 'news'));
            } else {
                return view('admin.home');
            }
        } 
    }
    public function about()
    {
        $doctor = doctor_info::all();
        return view('user.about',compact('doctor'));
    }
    public function doctors()
    {
        $doctor = doctor_info::all();
        return view('user.doctors',compact('doctor'));
    }
    public function news()
    {
        $news=news::paginate(4);
        $news_d = news::latest()->take(3)->get();
        return view('user.news',compact('news','news_d'));
    }
    public function news_open($id)
    {
        $news = news::find($id);
        $news_d = news::latest()->take(3)->get();
        return view('user.news_detail',compact('news','news_d'));
    }
    public function contact()
    {
        return view('user.contact');
    }
    public function appointment_destroy($id)
    {
        $appointment=appointment::find($id);
        $appointment->delete();
        return view('user.appointment_user');
    }
}
