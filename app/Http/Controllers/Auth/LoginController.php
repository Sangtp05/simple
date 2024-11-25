<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $customer = Customer::where('email', $request->email)->first();

        if (!$customer || !Hash::check($request->password, $customer->password)) {
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác.',
            ]);
        }

        // Lưu thông tin customer vào session
        session(['customer' => $customer]);

        return redirect('/')->with('success', 'Đăng nhập thành công!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('customer');
        return redirect('/');
    }
}