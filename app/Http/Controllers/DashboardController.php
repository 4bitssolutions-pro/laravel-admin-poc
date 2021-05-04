<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
   public function index(){
    if(Auth::User()->roles[0]->title=='Super_Admin')
    {
        return view('superadmin.dashboard');
    }


   }
}
