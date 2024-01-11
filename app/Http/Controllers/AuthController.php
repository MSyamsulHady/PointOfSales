<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;;

class AuthController extends Controller
{
    public function login()
    {
        if ($user = Auth::user()) {
            if ($user->role == 'superadmin') {
                return redirect()->intended('dashboard');
            } elseif ($user->role == 'pelanggan') {
                return redirect()->intended('frondend.main');
            }
        }
        return view('auth.login');
    }
    // proses login

    public function proseslogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $kredensial = $request->only('email', 'password');
        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'superadmin') {
                return redirect()->intended('dashboard');
            } elseif ($user->role == 'pelanggan') {
                return redirect()->intended('home');
            }
        }
        return back()->withErrors(['email' => 'email dan password yang anda masukan salah'])->onlyInput('email');
    }

    //logout

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
    // view dashbord
    public function dashbord()
    {
        return view('admin.dashboard');
    }

    public function User()
    {
        $user = DB::table('users')->get();
        return view('user.index', compact('user'));
    }


    public function register()
    {
        return view('auth.register');
    }
    public function RegisterPost(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'telepon' => 'required',
            'gender' => 'required',
            'alamat' => 'required',

        ]);


        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'alamat' => $request->alamat,

        ]);
        // event(new Registered($data));
        $data->save();
        return redirect('login');
    }
    public function view()
    {
        return view('frondend.main');
    }
}
