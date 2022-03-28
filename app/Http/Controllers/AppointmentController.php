<?php

namespace App\Http\Controllers;

use App\Mail\MyMail;
use Illuminate\Http\Request;
use App\Models\appointment;
use App\Models\approve_appointment;
use App\Models\cancled_appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = appointment::all();
        return view('admin.Appointment.aprove_appointment', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if (Auth::id()) {
            $appointment = new appointment();
            $appointment->name = $request->name;
            $appointment->email = $request->email;
            $appointment->date = $request->date;
            $appointment->speciality = $request->speciality;
            $appointment->number = $request->number;
            $appointment->message = $request->message;
            $appointment->status = 'In Progress';
            $appointment->user_id = Auth::user()->id;
            $appointment->save();
            return redirect()->back()->with('message', 'Appointment Successfully. We will contact you');
        } else {
            return redirect()->back()->with('message', 'Please Login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $appointment=appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=appointment::find($id);
        $approved=new approve_appointment();
        $approved->name=$data->name;
        $approved->email=$data->email;
        $approved->date=$data->date;
        $approved->speciality=$data->speciality;
        $approved->number=$data->number;
        $approved->message=$data->message;
        $approved->user_id=$data->user_id;
        $approved->status='approved';
        $approved->save();
        $data->delete();
        
        $pdf = PDF::LoadView('admin.appointment-pdf',[
            'name' => $approved->name,
            'email' => $approved->email,
            'date' => $approved->date,
            'status' => $approved->status,
        ]);
        Storage::put('public/storage/uploads/'.'-'.rand().'_'.time().'.'.$approved->name,$pdf->output());

        $user_mail = $approved->email;
        $details = [
            'email' => $user_mail,
            'title' => 'Mail from Het',
            'body' => 'Your appointment is approved. Please come on date : '.$approved->date  
        ];
        // Mail::send('emails.MyMail',$details,function($m)use($details,$pdf){
        //     $m->to($details["email"])->subject($details["title"])->attachData($pdf->output(), "devine.pdf");
        // });
        Mail::to($user_mail)->send(new MyMail($details));
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=appointment::find($id);
        $cancle=new cancled_appointment();
        $cancle->name=$data->name;
        $cancle->email=$data->email;
        $cancle->date=$data->date;
        $cancle->speciality=$data->speciality;
        $cancle->number=$data->number;
        $cancle->message=$data->message;
        $cancle->user_id=$data->user_id;
        $cancle->status='cancled';
        $cancle->save();
        $data->delete();
        return redirect()->back();
    }

    public function appointment()
    {
        $approved=approve_appointment::all();
        return view('admin.Appointment.appointment',compact('approved'));
    }
    public function cancled_appointment()
    {
        $cancled=cancled_appointment::all();
        return view('admin.Appointment.cancled_appointment',compact('cancled'));
    }
}
