<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use App\Models\User;
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

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */
    public function login(Request $request): RedirectResponse
    {
        $input = $request->all();

        $this->validate($request, [
            'password' => 'required|min:5',
            'email' => 'required|email'
        ], [
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be an email address.',
        ]);
        $user = User::where('email', $input['email'])->first();
        if ($user) {
            if ($user->status == 0) {
                // If the user's status is inactive, display a session message and redirect back to login
                Session::flash('error', 'Your account is inactive.');
                return redirect()->route('login');
            }
        }

        if (auth()->attempt(['email' => $input['email'], 'password' => $input['password'], 'status' => 1])) {
            // dd(auth()->user()->role_id); 
            // if (auth()->user()->role_id == 5) {
            //     return redirect()->route('store.index');
            // } else if (auth()->user()->role_id == 6) {
            //     return redirect()->route('store.index');
            // } else if (auth()->user()->role_id == 7) {
            //     return redirect()->route('sales.index');
            // } else if (auth()->user()->role_id == 8) {
            //     return redirect()->route('service.index');
            // } else {
            //     return view('auth.login');
            // }

            return redirect()->route('employee.employee');
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }


}
