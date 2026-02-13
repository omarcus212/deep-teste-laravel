<?php

namespace App\Http\Controllers\Auth;


use Auth;
use DateTime;
use Hash;
use Log;
use Password;
use App\Http\Requests\StoreUserLoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;


class AuthController
{
    public function showLogin()
    {
        return view('auth/login');
    }

    public function login(StoreUserLoginRequest $request)
    {

        $credentials = $request->validated();

        try {

            if (!Auth::attempt($credentials)) {
                return back()->with('error', 'Email não encontrado ou senha incorreta.');
            }

            $request->session()->regenerate();

            return redirect()->route('user/profile');

        } catch (\Throwable $e) {

            Log::error($e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Erro ao realizar login.' . $e->getMessage());
        }

    }

    public function showRegister()
    {
        return view('auth/register');
    }

    public function store(StoreUserRequest $request)
    {

        $data = $request->validated();

        try {

            $nowDate = new DateTime();

            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'email_verified_at' => $nowDate->format('Y-m-d H:i:s'),
                'password' => bcrypt($data['password']),
            ]);

            return redirect()->route('login')->with('success', 'Usuário criado com sucesso!');

        } catch (\Throwable $e) {

            Log::error($e->getMessage());
            return redirect()
                ->back()
                ->with('error', 'Erro ao criar conta. Tente novamente.' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

}
