<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor_info;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new doctor_info();
        $image = $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('doctor',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->save();
        return redirect()->back()->with('message','Doctor Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data= appointment::all();
        return view('admin.aprove_appointment',compact('data'));
    }

    public function approved($id)
    {
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }
    public function cancle($id)
    {
        $data=appointment::find($id);
        $data->status='cancled';
        $data->save();
        return redirect()->back();
    }
    public function manage_doctor(){
        $doctor=doctor_info::all();
        return view('admin.manage_doctor',compact('doctor'));
    }
    public function update_doctor($id){
        $doctor=doctor_info::find($id);
        return view('admin.doctor_update',compact('doctor'));
    }
    public function delete_doctor($id){
        $doctor=doctor_info::find($id);
        $doctor->delete();
        return redirect()->back(); 
    }
    public function update(Request $request,$id)
    {
        $doctor=doctor_info::find($id);
        $image = $request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('doctor',$imagename);
            $doctor->image=$imagename;
        }
        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->speciality=$request->speciality;
        $doctor->save();
        return redirect('manage_doctor');
    }
}
