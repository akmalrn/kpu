<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function halamanLogin()
    {
        return view('frontend.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:users,id',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::guard('siswa')->attempt(['id' => $request->id, 'password' => $request->password])) {
            return redirect()->route('siswa.dashboard');
        }

        return back()->withErrors(['id' => 'Id atau password salah.']);
    }
}
