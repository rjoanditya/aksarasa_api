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
        if (session('isAdmin') || session('isNarrators') || session('isAuthors')) {

            $val = session()->get('username');

            $user = User::where('username', $val)
                ->orWhere('email', $val)
                ->leftJoin('lib_roles', 'lib_users.roles_id', '=', 'lib_roles.id')
                ->select('lib_users.*', 'lib_roles.name AS role')
                ->first();
            $users = [
                'isLogin'   => 'true',
                'id'        => $user->id,
                'email'     => $user->email,
                'username'  => $user->username,
                'nickname'  => $user->nickname,
                'age'       => $user->age,
                'role'      => $user->role,
                'prefix'    => 'ak-' . $user->role
            ];
            session($users);
            // dd(session()->get('prefix'));
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
                return redirect(route('dashboard'));
            }
        }
        if ($data->roles_id == 2) {
            if (Hash::check($request->password, $data->password)) {
                session([
                    'isNarrators' => 'true',
                    'username' => $request->username,
                ]);
                // dd(session('isNarrators'));
                return redirect(route('dashboard'));
            }
        }
        if ($data->roles_id == 3) {
            if (Hash::check($request->password, $data->password)) {
                session([
                    'isAuthors' => 'true',
                    'username' => $request->username,
                ]);
                return redirect(route('dashboard'));
            }
        }
        return redirect('login')->with('message', 'the Password is not correct');
    }

    public function signup()
    {
        return view('auth.signup');
    }

    public function storeSignup(Request $request)
    {
        $data = [
            'email' => $request->email,
            'username' => $request->username,
            'nickname' => $request->nickname,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'status'   =>  $request->status
        ];

        if ($request->password != $request->conf_password) {
            return redirect(route('ak-signup'))->with('message', 'The password does not match!');
        }

        User::insert([
            'email' => $data['email'],
            'username' => $data['username'],
            'nickname' => $data['nickname'],
            'password' => $data['password'],
            'roles_id' => $data['role'],
            'status_activation'   => $data['status']
        ]);
        // $password = Hash::make($request->password);
        return redirect('login')->with('success', 'Thanks for filling out our form. Your account is activated now!');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/login');
    }
}