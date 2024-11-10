<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function form()
    {
        return view("register");
    }

    public function actionregister(Request $request)
{
    $user = User::create([
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'pencaker', // Atur peran sebagai 'pencaker' secara langsung
    ]);
    return redirect()->route('login')->with('success', 'Berhasil mendaftar sebagai pencaker');
}
}
