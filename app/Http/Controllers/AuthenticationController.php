<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthenticationController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function login() {
        return view('arifin.login');
    }

    public function postLogin(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);
        $credentials = array(
            'email' => $request['email'],
            'password' => $request['password'],
        );

        if (Auth::guard('web')->attempt($credentials)) {
            if (auth()->user()->status == 1) {
                if (auth()->user()->role == 1) {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('login')->with('error', 'The account level you entered does not match');
                }
            } else {
                Auth::guard('web')->logout();
                return redirect()->route('login')->with('error', 'Your account has been disabled');
            }
        } else {
            return redirect()->route('login')->with('error', 'The email or password you entered is incorrect. Please try again');
        }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 1,
        ]);

        // $user = new User();
        // $user->username = $request->input('username');
        // $user->email = $request->input('email');
        // $user->status = 'aktive';
        // $user->password = Hash::make($request->input('password'));
        // $user->save();


        return redirect()->route('login')->with('success', 'User berhasil ditambahkan!');
    }
    public function create()
    {
        return view('arifin.create');
    }
}
