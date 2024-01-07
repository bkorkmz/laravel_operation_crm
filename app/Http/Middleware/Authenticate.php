<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if(Auth::check()){
//            dd(auth()->user()->roles[0]->name );
//            if ( Auth::user()->hasRole('user') && Auth::user()->user_check == 0) {
//                return redirect('student');
//            }
            
            return $next($request);
        }else{
            Session::flush();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            return redirect()->route('login');
        }
        
      
    }
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
}
