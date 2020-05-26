<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
class AuthController extends Controller
{
    public function register(Request $req)
    {
        $this->validate($req, [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password'=>'required',
        ]);
        $var = User::create([
            'name' => $req->name,
            'email'=>$req->email,
            'password' => hash::make($req->password)
        ]);
        return response()->json($var);
    }

    public function login(Request $req)
    {
        $this->validate($req, [
            'password'=>'required',
        ]);
        $var = User::where(['email'=> $req->email])->first();
        if(!$var){
            return response()->json(['login gagal']);
        }
        $_isPassword = hash::check($req->password, $var->password);
        if(!$_isPassword){
            return response()->json(['login gagal']);
        }
        $generateToken = bin2hex(random_bytes(40));
        $var->update([
            'token' => $generateToken
        ]);
        return response()->json($var);
    }
}
