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
            if (Auth::user()->userType == '0') {
                $doctor = doctor_info::all();
                $items = doctor_info::pluck('speciality');
                return view('user.home', compact('doctor','items'));
            } else {
                return view('admin.home');
            }
        } else {
        }
    }
    public function appointment(Request $request)
    {
        $appointment= new appointment();
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->date = $request->date;
        $appointment->speciality = $request->speciality;
        $appointment->number = $request->number;
        $appointment->message = $request->message;
        $appointment->status = 'In Progress';
        if(Auth::id())
        {
            $appointment->user_id = Auth::user()->id; 
        }
        $appointment->save();
        return redirect()->back()->with('message','Appointment Successfully. We will contact you');
    }
    public function appointment_user()
    {
        if(Auth::id())
        {
            $userid=Auth::user()->id;
            $appointment=appointment::where('user_id',$userid)->get();
            return view('user.appointment_user',compact('appointment'));
        }
        else{
            return redirect()->back();
        }
    }
    public function cancle_appointment($id){
        $appointment=appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }
}
