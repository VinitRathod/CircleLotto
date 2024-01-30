<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\AdminUsers;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //

    public function login(Request $request): RedirectResponse
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (AdminUsers::where('email', $credentials['email'])->exists()) {
                $hashedPassword = AdminUsers::where('email', $credentials['email'])->first();
                if (Hash::check($credentials['password'], $hashedPassword->password)) {

                    $request->session()->regenerate();
                    session(['logged_in' => true, 'user' => $hashedPassword]);
                    return redirect()->intended('admin/dashboard');
                }
            }

            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        } catch (Exception $e) {
            Log::error($e);
            return back()->withErrors([
                'email' => "" . $e->getMessage(),
            ]);
        }
    }


    public function logout(Request $request)
    {
        $request->session()->forget(['logged_in', 'user']);
        return redirect('/admin/login');
    }
}
