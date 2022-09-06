<?php

namespace App\Http\Controllers\Doctors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function __construct()
    {
       // $this->middleware('auth:doctor');
    }

    public function index(){

        $doctor = Auth::guard('doctor')->user();

        return view('doctors.dashboard', compact(
            'doctor'
        ));
    }
}
