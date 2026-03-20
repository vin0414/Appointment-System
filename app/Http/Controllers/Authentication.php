<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use App\Services\LogService;
use \App\Models\User;


class Authentication extends Controller
{
    private $logService;
    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }

    public function Authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:rfc,dns',
            'password' => [
                'required',
                'min:8',
                'max:255',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/'
            ],
        ], [
            // Email errors
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',

            // Password errors
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password must not exceed 255 characters.',
            'password.regex' => 'Password must include at least one uppercase letter, one lowercase letter, one number, and one special character.',
        ]);


        $throttleKey = strtolower($request->input('email')) . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            return back()->with('error','Too many login attempts. Please try again later.');
        }

        RateLimiter::hit($throttleKey,60);

        $user = User::where('email', $credentials['email'])
                ->whereNotNull('email_verified_at')
                ->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->with(
                'error','Invalid Email or Password.', // Generic message
            );
        }

        if (Auth::attempt($credentials))
        {
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();
            //log the event log
            $this->logService->saveLogs('User logged in',$request->ip(),$request->header('User-Agent'));
            return redirect()->intended('/dashboard');
        }
    }

    public function logout(Request $request)
    {
        //log the event log
        $this->logService->saveLogs('User logged out',$request->ip(),$request->header('User-Agent'));
        Auth::logout();
        Session::flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/auth")->with('error','You are logged out!');
    }
}