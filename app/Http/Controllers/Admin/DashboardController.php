<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){

//        $user = Auth::user();
//
//        echo 'ID: '.Auth::id().'<br/>';
//        echo 'ID: '.$user->id.'<br/>';

        $user = $request->user();

        return '<h1>Dashboard</h1>';
    }
}
