<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Socialite;
use Str;
class AuthController extends Controller
{
    // start of login&register view
    public function loginview()
    {

        return view('auth/login');
    }

   public function registerview(){

        return view('auth/register');
    }
    // end of login&register view


    // start of login&register


    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        $validatedData['password'] = Hash::make($request->password);

        $user = User::create($validatedData);

       return redirect('/');

      }

    public function login(Request $request)
    {

        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'This User does not exist, check your details'], 400);
        }
        return redirect('/');
    }
    //    end start of login&register view

// Logout function
    public function logout(){
      Auth::logout();
        return redirect('/');
    }


public function google()
{
    return Socialite::driver('google')->redirect();
}

public function google_redirect()
{
    $user=Socialite::driver('google')->user();
dd($user);
    $user=User::firstOrCreate(['email'=>$user->email],
    [
        'name'=>$user->name,
        'password'=>Hash::make(Str::random(24))
    ]);
    Auth::login($user,true);
return redirect('/');
}

}
