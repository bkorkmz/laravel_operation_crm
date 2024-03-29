<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated()
    {
        if (Auth::user()->user_check !== 1) {
            Auth::logout();
            return redirect('/user_block')->withError('Hesabınız banlanmıştır!',);
        }
    }

//    protected function authenticated(Request $request)
//    {
//
//        if (auth()->user()->status == 2) {
//            $this->guard()->logout();
//            $request->session()->invalidate();
//            $request->session()->regenerateToken();
//            if ($request->wantsJson()) {
//                return response()->json([
//                    'error' => true,
//                    'message' => __('Hesabınız banlandı'),
//                    'code' => 204
//                ], 200);
//            }
//            else {
//                return view('user_block');
//            }
//
//        }
//    }



//   protected function redirectTo()
//    {
//        if (auth()->user()->status  == 0) {
//            $user = User::select('status')->where('id', auth()->user()->id)->first();
//                return redirect()->route('user_block');
//        } else {
//            return redirect()->route('backend.index');
//        }
//
//    }

}
