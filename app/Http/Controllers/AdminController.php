<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\approve_appointment;
use App\Models\cancled_appointment;
use App\Models\doctor_info;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.home');
    }

  
}
