<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function dashboard()
    {
        $val = session()->get('username');

        $user = User::where('username', $val)
            ->orWhere('email', $val)
            ->leftJoin('lib_roles', 'lib_users.roles_id', '=', 'lib_roles.id')
            ->select('lib_users.*', 'lib_roles.name AS role')
            ->first();
        $users = [
            'isLogin'   => 'true',
            'email'     => $user->email,
            'username'  => $user->username,
            'nickname'  => $user->nickname,
            'age'       => $user->age,
            'role'      => $user->role,
        ];
        session($users);

        if (session('isAdmin') || session('isNarrators') || session('isAuthors')) {
            return view('pages.home');
        } else {
            return redirect('/login');
        }
    }

    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $username = $request->username;
        $data = User::where('username', $username)->orWhere('email', $username)->first();

        if ($data == null) {
            return redirect('login')->with('message', 'Username or Email is not valid');
        }

        if ($data->roles_id == 1) {
            if (Hash::check($request->password, $data->password)) {
                session([
                    'isAdmin' => 'true',
                    'username' => $request->username,
                ]);
                return redirect('ak-admin/dashboard');
            }
        }
        if ($data->roles_id == 2) {
            if (Hash::check($request->password, $data->password)) {
                session([
                    'isNarrators' => 'true',
                    'username' => $request->username,
                ]);
                // dd(session('isNarrators'));
                return redirect('ak-narrator/dashboard');
            }
        }
        if ($data->roles_id == 3) {
            if (Hash::check($request->password, $data->password)) {
                session([
                    'isAuthors' => 'true',
                    'username' => $request->username,
                ]);
                return redirect('/ak-authors/dashboard');
            }
        }
        return redirect('login')->with('message', 'the Password is not correct');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function storeSignup()
    {
        return redirect('login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}