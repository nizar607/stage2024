<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            // Check the user's role after authentication
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/admin/dashboard'); // Redirect to admin dashboard
            } else {
                return redirect()->intended('/home'); // Redirect to user home
            }
        }
    
        // If login fails
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }
    
    public function logout(Request $request)
{
    Auth::logout();  // Logout the user
    $request->session()->invalidate();  // Invalidate the session
    $request->session()->regenerateToken();  // Regenerate the CSRF token

    return redirect('/login');  // Redirect to login after logout
}

    

   

    public function adminLogin(Request $request)
    {
        $this->validateLogin($request);

        if (Auth::guard('web')->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/admin/dashboard');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    // public function adminLogout(Request $request)
    // {
    //     Auth::guard('web')->logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect('/admin/login');
    // }

    // public function userLogout()
    // {
    //     Session::flush();
    //     Auth::logout();
    //     return redirect('login');
    // }
    
    
    

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    }
}