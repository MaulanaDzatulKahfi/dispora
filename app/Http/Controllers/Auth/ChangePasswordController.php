<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi!',
            'min' => 'password minimal 8 karakter',
            'same' => 'Password tidak sama',
            'max' => ':attribute Kepanjangan',
            'different' => 'Password tidak boleh sama, dengan password lama'
        ];
        $this->validate($request,[
            'password_saat_ini' => [new MatchOldPassword, 'required', 'different:password_baru'],
            'password_baru' => 'required|min:8|max:50|string' ,
            'konfirmasi_password_baru' => 'same:password_baru',
        ], $messages);

        User::find(Auth::user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return redirect()->route('profil')->with('success', 'Password Berhasil Diedit!');
    }
}
