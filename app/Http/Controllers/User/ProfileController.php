<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\StoreUserPhotoRequest;
use Auth;
use Hash;
use Log;
use Storage;
use App\Http\Requests\StoreUserResetPasswordRequest;
use App\Http\Requests\StoreUserUpdate;
use Illuminate\Http\Request;

class ProfileController
{
    public function showProfile()
    {
        $user = Auth::user();
        return view('user/profile', compact('user'));

    }

    public function profileUpdate(StoreUserUpdate $request)
    {
        $data = $request->validated();

        try {

            $user = Auth::user();

            if (
                ($data['name'] ?? $user->name) === $user->name &&
                ($data['email'] ?? $user->email) === $user->email
            ) {
                return back()->with('info', 'Nenhuma alteração foi feita.');
            }

            $user->update($data);

            return back()->with('success', 'Perfil atualizado com sucesso!');

        } catch (\Throwable $e) {

            Log::error($e->getMessage());
            return back()->with('error', 'Erro ao atualizar perfil.');
        }

    }

    public function resetPassword(StoreUserResetPasswordRequest $request)
    {

        try {
            $user = Auth::user();

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Senha atual incorreta.');
            }

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return back()->with('success', 'Senha atualizada com sucesso!');

        } catch (\Throwable $e) {

            Log::error($e->getMessage());
            return back()->with('error', 'Error ao atualizar senha.');
        }

    }

    public function updatePhoto(StoreUserPhotoRequest $request)
    {

        try {

            $file = $request->file('photo');

            $user = Auth::user();

            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            $extension = $file->getClientOriginalExtension();
            $filename = \Illuminate\Support\Str::uuid() . '.' . $extension;
            $path = $file->storeAs('photo_profile', $filename, 'public');

            $user->photo = $path;
            $user->save();

            return back()->with('success', 'Foto de perfil atualizada com sucesso!');

        } catch (\Throwable $e) {

            Log::error($e->getMessage());
            return back()
                ->withInput()
                ->withErrors(['photo' => 'Ocorreu um erro ao processar a foto. Tente novamente.']);

        }

    }

}
