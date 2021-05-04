<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
   public function index(){
       if(count(Auth::user()->roles)>0){
    if(Auth::User()->roles[0]->title=='Super_Admin')
    {
        return redirect('/superadmin');
    }
}
    return redirect('/not-activated');
   }


public function notactivated()
{

return view('notactivated');
}


}
