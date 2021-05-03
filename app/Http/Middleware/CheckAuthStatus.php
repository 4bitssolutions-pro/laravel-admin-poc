<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAuthStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Auth::user();
        if ($user) {
            if (!$user->is_active) {
                \Session::flush();
                return redirect()->route('login')->with(['status' => 'Your account is not activated!']);
            }
        }
        return $next($request);
    }
}
