<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logIn(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $loginInfos = $request->only('email', "password");
        if (Auth::attempt($loginInfos)) {
            return $this->updateToken($request["email"]);
        } else {
            return ["success" => false];
        }
    }
    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);


        $data = $request->all();
        $check = $this->create($data);
    }
    private function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function updateToken($email)
    {
        $token = Str::random(60);
        $user = User::where('email', $email)->first();
        $user->api_token = hash('sha256', $token);
        $user->save();
        return [
            "token" => $token,
            "success" => true
        ];
    }
}
