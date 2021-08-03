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
        $role = auth()->user()->role->name;
        switch ($role){
            case 'Admin':
                return $this->redirectTo = route('users.index');
                break;
            case 'Doctor':
                return $this->redirectTo = route('doctor.patients.index');
                break;
            case 'Patient':
                return $this->redirectTo = route('complaints.index');
                break;
            case 'Lab Technician':
                return $this->redirectTo = route('lab_tech.create');
                break;
            case 'Pharmacist':
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
