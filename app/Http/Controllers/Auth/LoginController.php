<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo;
    public function redirectTo(){
        $role = auth()->user()->role_id;
        switch ($role){
            case 1:
                return $this->redirectTo = route('admin.index');
                break;
            case 2:
                return $this->redirectTo = route('doctor.patients.index');
                break;
            case 3:
                return $this->redirectTo = route('complaints.index');
                break;
            case 4:
                return $this->redirectTo = route('lab_tech.create');
                break;
            case 5:
                return $this->redirectTo = route('pharmacist.index');
                break;
            default:
                return '/';
                break;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
