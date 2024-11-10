<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
       return view('user',[
        'data_user' => User::all()
       ]);
    }
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = $request->input('role');
        $user->save();
        return redirect("user")->with('success', 'Berhasil mengubah data pengguna');
    }
    public function delete($id_user)
    {
        User::destroy($id_user);
        return redirect('user')->with('success', 'Berhasil menghapus pengguna');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('user',[
            'data_user' => $user
        ]);
    }
    public function actionuser(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        return redirect('user')->with('success', 'Berhasil mendaftar sebagai pencaker');
    }
}
